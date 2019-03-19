class HomeController{

    constructor(){
        this._inputListEspecie = Array.from(document.querySelectorAll(".check-especie"));

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

        let filter = "";

        //Novo array formado apenas com os checkbox marcados
        const inputListEspecieChecked = this._inputListEspecie.filter(el => el.checked);

        if(inputListEspecieChecked.length >= 1) {

            filter += "and ( ";

            for (let index = 0; index < inputListEspecieChecked.length; index++) {

                filter += `t1.esp_id = ${inputListEspecieChecked[index].value}`;

                if( ( index + 1) != inputListEspecieChecked.length) filter +=" or ";
                else filter += ")";            
            }
        }

        return filter;
    }
}