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
        this._page = 1;
        this._animalsPerPage = 12;

        this._http = new HttpService();
        this._view = new PublicacoesView(document.querySelector('#view-publicacoes'));


        this._init();
    }

    async encontrar(ani_id) {
        //para funcionar no modal do bootstrap
        $(document).off('focusin.modal');

        const {value: text} = await Swal.fire({
            title: 'Encontrou este animal?',
            input: 'textarea',
            inputPlaceholder: 'Informe mais detalhes para o dono',
            showCancelButton: true,
            confirmButtonColor: '#43a047',
            cancelButtonColor: '#bbb',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar'
        });
        
        if (text) {
            this._http
                .post('/home/pedir-adocao', {
                    "ani_id": ani_id,
                    "text": text,
                    'sta_id': 9
                })
                .then(data => {
                    //console.log(data);

                    Swal.fire({
                        type: 'success',
                        title: 'Pronto!',
                        text: 'Informações sobre o animal enviadas com sucesso!'
                    }).then(()=>
                        document.location.reload(true)                        
                    )
                })
                .catch(err => {
                    console.log(err.message);
                });    
        }
    }

    async adotar(ani_id) {
        //para funcionar no modal do bootstrap
        $(document).off('focusin.modal');

        const {value: text} = await Swal.fire({
            title: 'Pedir em adoção',
            input: 'textarea',
            inputPlaceholder: 'Informe mais detalhes para o dono',
            showCancelButton: true,
            confirmButtonColor: '#43a047',
            cancelButtonColor: '#bbb',
            confirmButtonText: 'Enviar',
            cancelButtonText: 'Cancelar'
        });
          
        if (text) {
            this._http
                .post('/home/pedir-adocao', {
                    "ani_id": ani_id,
                    "text": text,
                    'sta_id': 6
                })
                .then(data => {
                    //console.log(data);

                    Swal.fire({
                        type: 'success',
                        title: 'Pronto!',
                        text: 'Pedido de adoção enviado com sucesso!'
                    }).then(()=>
                        document.location.reload(true)                        
                    )
                })
                .catch(err => {
                    console.log(err.message);
                });    
        }
    }

    
    openModal(id){
        $(`#animal-details-${id}`).modal('show');
    }

    changePagination() {
        setTimeout(() => {
            this._page = parseInt(document.querySelector('.active').textContent);
            this._load();
        }, 250);
    }

    async changeFilter() {
        this._page = 1;
        
        this._filter = this._checkFilter();

        const count =  await this._checkTotal();
        let qtdPaginacao = parseInt(parseInt(count)/this._animalsPerPage)+1;

        this._pagination(qtdPaginacao);        
        this._load();
    }

    _checkTotal() {
        
        return this._http
            .post("/home/check-total", {
                "filter": this._filter
            })
            .then(data => (data.count)-1)
            .catch(err => console.log(err.message));
    }

    _pagination(size , page=1) {

        document.getElementById('pagination').innerHTML = '';

        Pagination.Init(
            document.getElementById('pagination'),
            {
                size:size,
                page:page,
                step:2
            }
        )
    };    

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

    _load() {
        // console.log(`Filter: ${this._filter}`);
        // console.log(`Page: ${this._page}`);
        // console.log(`Per Page: ${this._animalsPerPage}`);
        // console.log(`Page Skip: ${parseInt((this._page * this._animalsPerPage) - this._animalsPerPage)}`);

        this._http
            .post("/home/search", {
                "filter": this._filter,
                "page": parseInt((this._page * this._animalsPerPage) - this._animalsPerPage),
                "per_page": parseInt(this._animalsPerPage)
            })
            .then(data => {
                this._view.update(data)
                console.log(data);
            })
            .catch(err => console.log(err.message));
    }

    async _init() {

        this._load(); 
        
        const count =  await this._checkTotal();
        let qtdPaginacao = parseInt(parseInt(count)/this._animalsPerPage)+1;

        this._pagination(qtdPaginacao);    
               
    }    
}