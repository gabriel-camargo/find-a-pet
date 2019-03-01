class AnimalController{

    constructor(){
        this._inputId = document.querySelector("#inputIdAnimal");
        this._inputNome = document.querySelector("#inputNomeAnimal");
        this._inputStatus = document.querySelector("#inputStatusAnimal");
        this._inputFaixaEtaria = document.querySelector("#inputFaixaEtaria");
        this._inputPorte = document.querySelector("#inputPorteAnimal");
        this._inputInformacoes = document.querySelector("#inputInformacoesAnimal");
        this._inputEspecie = document.querySelector("#inputEspecieAnimal");
        this._inputFoto = document.querySelector("#inputFotoAnimal");

        this._croppieImage = this.cropImage();
        this._http = new HttpService();
    }

    cropImage(){

        let el = document.getElementById('image_demo');
        
        return new Croppie( el, {
            enableExif: true,
            viewport: {
                width:200,
                height:200,
                type:'square'
            },
            boundary:{
                width:250,
                height:250
            },
            
        });
        
    }

    loadImage(input){
        let reader = new FileReader();

        reader.onload = (event) => {
            this._croppieImage.bind({
                url: event.target.result
            });
        }

        reader.readAsDataURL(input.files[0]);
    }

    createAnimal(event){
        event.preventDefault();

        this._croppieImage.result({
            type: 'canvas',
            size: 'viewport'
        }).then( (response) => {

            let newAnimal = this.newAnimal();       

            if (this._inputFoto.value === "") response = null; 
            
            this._http
                .post('/animais/create/', newAnimal)
                .then(data => {

                    if(response) this.savePhoto(data.lastId, response);
                    window.location = "/animais/"; 

                } )
                .catch(err => {
                    console.log(err.message);

                    window.scrollTo(0,0);                   
                    document.getElementById("div-alert-erro").innerHTML = `

                        <p class="alert alert-danger">
                            <strong> Erro! </strong> 
                            Você deve preencher todos os campos obrigatórios!
                        </p>

                    `; 
                });
        })
    }

    savePhoto(ani_id, image){        

        this._http
            .post('/animais/savePhoto/', {
                "id": ani_id,
                "image": image
            })
            .then(data => console.log(data))
            .catch(err => {
                console.log(err.message);
            });
        
    }

    updatePhoto(id){
        this._croppieImage.result({
            type: 'canvas',
            size: 'viewport'
        })
        .then( (response) =>{
            if (this._inputFoto.value === "") response = null;
            this.savePhoto(id, response);
            window.location = "/animais/"; 
        });
    }

    newAnimal(){
        return new Animal(
            this._inputNome.value,
            document.querySelector('input[name="ani_sexo"]:checked').value,
            this._inputStatus.value,
            this._inputFaixaEtaria.value,
            this._inputPorte.value,
            this._inputInformacoes.value,
            this._inputEspecie.value
        );  
    }

    excluir(id)
    {
        Swal.fire({
            title: 'Tem certeza que deseja excluir este animal?',
            text: "Esta ação não poderá ser revertida!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#888',
            confirmButtonText: 'Excluir!',
            cancelButtonText: 'Cancelar'
        })
        .then((result) => {

            if (result.value) {
                this._http
                    .get(`/animais/delete/${id}`)
                    .then(data =>{ 

                        Swal.fire(
                            'Pronto!',
                            data,
                            'success'
                        ).then(()=>
                            document.location.href = "/animais"
                        );

                    })
                    .catch(err => {

                        console.log(err.message);
                        
                        Swal.fire(
                            'Erro!',
                            'Não foi possível excluir este animal!',
                            'error'
                        );

                    });
            }
        });
    }
}