class HomeController{

    constructor(){
        this._inputListEspecie = Array.from(document.querySelectorAll(".check-especie"));
        this._inputListSexo = Array.from(document.querySelectorAll(".check-sexo"));

        this._http = new HttpService();
        this._view = new HomeView(document.querySelector('#view-publicacoes'));

        this.load();
    }

    load() {

        let filter = this._checkFilter();
        console.log(`Filtro => ${filter}`);

        this._http
            .post("/home/search", {
                "filter": filter,
                "page": 1
            })
            .then(data => this._view.update(data))
            .catch(err => console.log(err.message));
    }

    _checkFilter() {

        let filterEspecie = "";

        //Novo array formado apenas com os checkbox marcados
        const inputListEspecieChecked = this._inputListEspecie.filter(el => el.checked);
        if(inputListEspecieChecked.length >= 1) filterEspecie += this._addFilter(inputListEspecieChecked, "t1.esp_id", filterEspecie); 
        
        let filterSexo = "";
        const inputListSexoChecked = this._inputListSexo.filter(el => el.checked);
        if(inputListSexoChecked.length >= 1) filterSexo += this._addFilter(inputListSexoChecked, "t1.ani_sexo", filterSexo);

        let filter = filterEspecie + filterSexo;
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

    
}