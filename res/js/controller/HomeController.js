class HomeController{

    constructor(){
        this._inputListEspecie = Array.from(document.querySelectorAll(".check-especie"));
        this._inputListSexo = Array.from(document.querySelectorAll(".check-sexo"));
        this._inputListStatus = Array.from(document.querySelectorAll(".check-status"));
        this._inputListPorte = Array.from(document.querySelectorAll(".check-porte"));
        this._inputListFaixa = Array.from(document.querySelectorAll(".check-faixa"));
        this._inputListCidade = Array.from(document.querySelectorAll(".check-cidade"));
        this._inputListUf = Array.from(document.querySelectorAll(".check-uf"));

        this._filter = "";

        this._http = new HttpService();
        this._view = new PublicacoesView(document.querySelector('#view-publicacoes'));


        this._init();
    }

    changePagination(){
        setTimeout(() => {
             console.log(document.querySelector('.active').textContent) 
        }, 250);
    }

    _pagination(size = 30, page = 1) {
        Pagination.Init(
            document.getElementById('pagination'),
            {
                size:size,
                page:page,
                step:2
            }
        )
    };

    load() {

        this._filter = this._checkFilter();
        console.log(`Filtro => ${this._filter}`);

        this._http
            .post("/home/search", {
                "filter": this._filter,
                "page": 1
            })
            .then(data => this._view.update(data))
            .catch(err => console.log(err.message));
    }

    _checkFilter() {

        let filterEspecie = "";

        //Novo array formado apenas com os checkbox marcados
        const inputListEspecieChecked = this._inputListEspecie.filter(el => el.checked);

        //Se tiver algum checkbox marcado, chama a função que adiciona o filtro SQL
        if(inputListEspecieChecked.length >= 1) 
            filterEspecie += this._addFilter(inputListEspecieChecked, "t1.esp_id", filterEspecie); 

        //A mesma lógica se repete para os outros filtros
        
        //sexo
        let filterSexo = "";
        const inputListSexoChecked = this._inputListSexo.filter(el => el.checked);
        if(inputListSexoChecked.length >= 1) filterSexo += this._addFilter(inputListSexoChecked, "t1.ani_sexo", filterSexo);

        //status
        let filterStatus = "";
        const inputListStatusChecked = this._inputListStatus.filter(el => el.checked);
        if(inputListStatusChecked.length >= 1) filterStatus += this._addFilter(inputListStatusChecked, "t1.sta_id", filterStatus);

        //porte
        let filterPorte = "";
        const inputListPorteChecked = this._inputListPorte.filter(el => el.checked);
        if(inputListPorteChecked.length >= 1) filterPorte += this._addFilter(inputListPorteChecked, "t1.por_id", filterPorte);

        //faixa etária
        let filterFaixa = "";
        const inputListFaixaChecked = this._inputListFaixa.filter(el => el.checked);
        if(inputListFaixaChecked.length >= 1) filterFaixa += this._addFilter(inputListFaixaChecked, "t1.fai_id", filterFaixa);

        //cidade
        let filterCidade = "";
        const inputListCidadeChecked = this._inputListCidade.filter(el => el.checked);
        if(inputListCidadeChecked.length >= 1) filterCidade += this._addFilter(inputListCidadeChecked, "t1.ani_cidade", filterCidade);

        //uf
        let filterUf = "";
        const inputListUfChecked = this._inputListUf.filter(el => el.checked);
        if(inputListUfChecked.length >= 1) filterUf += this._addFilter(inputListUfChecked, "t1.ani_uf", filterUf);

        //soma todos os filtros e retorna o mesmo na função
        const filter = filterEspecie + filterSexo + filterStatus + filterPorte + filterFaixa + filterCidade + filterUf;
        return filter;
    }

    _addFilter(arr, field, filter) {

        filter += " and ( ";

        for (let index = 0; index < arr.length; index++) {

            filter += `${field} = ${arr[index].value}`;

            if( ( index + 1) != arr.length) filter +=" or ";
            else filter += ")";            
        }

        return filter;
    }

    _init() {
        this.load();
        this._pagination();    
    }

    
}