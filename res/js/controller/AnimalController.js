class AnimalController{

    constructor(){
        this._inputId = document.querySelector("#inputIdAnimal");
        this._inputNome = document.querySelector("#inputNomeAnimal");
        this._inputFaixaEtaria = document.querySelector("#inputFaixaEtaria");
        this._inputPorte = document.querySelector("#inputPorteAnimal");
        this._inputInformacoes = document.querySelector("#inputInformacoesAnimal");
        this._inputEspecie = document.querySelector("#inputEspecieAnimal");
        this._inputFoto = document.querySelector("#inputFotoAnimal");
        this._inputUf = document.querySelector("#inputUf");
        this._inputCidade = document.querySelector("#inputCidade");

        this._lastId = 0;
        this._croppieImage = this.cropImage();
        this._http = new HttpService();
    }

    cropImage() {
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

    _resetForm() {
        this._inputCidade.value = '';
        this._inputEspecie.value = '';
        this._inputFaixaEtaria.value = '';
        this._inputInformacoes.value = '';
        this._inputNome.value = '';
        this._inputPorte.value = '';
        this._inputUf.value = '';
        document.getElementById('ani_sexo_m').checked = false;
        document.getElementById('ani_sexo_f').checked = false;
    }

    async createAnimal(event) {
        event.preventDefault();

        let newAnimal = this.newAnimal();

        this._lastId = await this._requestInsertAnimal(newAnimal);

        if(this._lastId > 1){
            Swal.fire({
                title: 'Cadastro realizado!',
                text: "Deseja adicionar uma foto para seu bichinho? :)",
                type: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Sim, vamos!',
                cancelButtonText: 'Talvez mais tarde'
            }).then( (result) => {
                if (result.value) {
                    //resetar formulário
                    this._resetForm();

                    //lançar modal
                    //desculpa pelo JQuery ;------; 
                    $('#croppie-modal').modal('show');
                } else {
                    //redirecionar
                    document.location.href = "/animais";
                }
            });
        } else {
            Swal.fire(
                'Ops! Não foi possível cadastrar seu amigo... :(',
                'Verifique os campos obrigatórios!',
                'error'
            )
        }
    }

    _requestInsertAnimal(animal) {
        return this._http
            .post('/animais/create/', animal)
            .then(data => data.lastId)
            .catch(err => {
                console.log(err.message);

                return -1;
            });
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

    updatePhoto(ani_id = -1){
        const id = (ani_id > 0)? ani_id:this._lastId;
        
        this._croppieImage.result({
            type: 'canvas',
            size: {width: 400, height:400},
            quality: 1,
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
            1,
            this._inputFaixaEtaria.value,
            this._inputPorte.value,
            this._inputInformacoes.value,
            this._inputEspecie.value,
            this._inputUf.value,
            this._inputCidade.value 
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