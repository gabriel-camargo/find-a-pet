class HomeController{

    constructor(){
        this._inputListEspecie = document.querySelectorAll(".check-especie");

        // this._http = new HttpService();
    }

    log() {
        this._inputListEspecie.forEach(el => {
            if(el.checked) {
                console.log(`Espécie: ${el.value}`);
            }
        });
    }
}