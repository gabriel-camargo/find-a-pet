class HomeController{

    constructor(){
        this._inputListEspecie = document.querySelectorAll(".check-especie");

        this._http = new HttpService();
        this._view = new HomeView(document.querySelector('#view-publicacoes'));
    }

    load() {
        this._http
            .post("/home/search", {
                "filter": "",
                "page": 1
            })
            .then(data => this._view.update(data))
            .catch(err => console.log(err.message));
    }

    log() {
        this._inputListEspecie.forEach(el => {
            if(el.checked) {
                console.log(`Espécie: ${el.value}`);
            }
        });
    }
}