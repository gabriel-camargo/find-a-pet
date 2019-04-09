class UsuarioConfiguracoesController{

    constructor(){
        this._inputId = document.querySelector("#inputId");
        this._inputNome = document.querySelector("#inputNome");
        this._inputEmail = document.querySelector("#inputEmail");
        this._inputUf = document.querySelector("#inputUf");
        this._inputCidade = document.querySelector("#inputCidade");
        
        this._inputFoto = document.querySelector("#inputFoto");

        this._inputOldSenha = document.querySelector("#inputSenhaOld");
        this._inputNewSenha = document.querySelector("#inputSenhaNew");
        this._inputNewSenhaConfirm = document.querySelector("#inputSenhaNewConfirm");

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

    updatePhoto(id){
        this._croppieImage.result({
            type: 'canvas',
            size: {width: 400, height:400},
            quality: 1,
        })
        .then( (response) =>{
            if (this._inputFoto.value === "") response = null;
            this.savePhoto(id, response);
            document.location.reload(true)
        });
    }

    async savePhoto(id, image){        

        const r = await this._http
            .post('/usuario/configuracoes/savePhoto', {
                "id": id,
                "image": image
            })
            .then(data => console.log(data))
            .catch(err => {
                console.log(err.message);
            });
        return r;
        
    }

    showDadosCadastrais(el) {
        document.querySelector("#card-dados-cadastrais").style.display = "block";
        document.querySelector("#card-atualizar-senha").style.display = "none";

        let elements = document.querySelectorAll('.sidebar__link');
        elements.forEach(e => {
            e.classList.remove('sidebar__link--status-selected');
        });

        el.classList.add('sidebar__link--status-selected');
    }

    showUpdateSenha(el) {
        document.querySelector("#card-dados-cadastrais").style.display = "none";
        document.querySelector("#card-atualizar-senha").style.display = "block";

        let elements = document.querySelectorAll('.sidebar__link');
        elements.forEach(e => {
            e.classList.remove('sidebar__link--status-selected');
        });

        el.classList.add('sidebar__link--status-selected');
    }

    async submitPassword(event) {
        event.preventDefault();

        const confirmSenha = await this._verifySenha();
        
        if(confirmSenha) {
            if(this._inputNewSenha.value === this._inputNewSenhaConfirm.value) {

                console.log("Atualizando senha...");
                this._http   
                    .post('/usuario/configuracoes/alterar-senha', {
                        "senha": this._inputNewSenha.value
                    })
                    .then(data => {
                        Swal.fire(
                            'Sucesso!',
                            'Cadastro atualizado com sucesso!',
                            'success'
                        ).then( result => document.location.reload(true));
                    })
                    .catch(err => console.log(err) );

            } else {
                Swal.fire(
                    'Erro!',
                    'Senhas não correspodem!',
                    'error'
                )
            }
        } else {
            Swal.fire(
                'Erro!',
                'Senha incorreta!',
                'error'
            )
        }
    }

    _verifySenha() {
        return this._http   
            .post('/usuario/configuracoes/confirmar-senha', {
                "senha": this._inputOldSenha.value
            })
            .then(data => data.validou)
            .catch(err => false )
    }

    submit(event) {
        event.preventDefault();
        
        Swal.fire({
            type: 'info',
            title: 'Informe sua senha:',
            input: 'password',
            showCancelButton: true,
            confirmButtonText: 'Salvar',
            cancelButtonText: 'Cancelar',
            inputAttributes: {
                autocapitalize: 'off'
            },
            preConfirm: async (senha) => 
                this._http   
                    .post('/usuario/configuracoes/confirmar-senha', {
                        "senha": senha,
                        "id": this._inputId.value
                    })
                    .then(data => data.validou)
                    .catch(err => {
                        Swal.showValidationMessage(
                            `As senhas não correspondem!`
                        )
                        console.log(err)
                    }),
            
        }).then( result => {
            if(result.value) {

                let usuario = new Usuario(
                    this._inputId.value,
                    this._inputNome.value,
                    this._inputEmail.value,
                    '',
                    this._inputUf.value,
                    this._inputCidade.value,
                );

                this._http   
                    .post('/usuario/configuracoes/save', usuario)
                    .then(data => { 
                        Swal.fire(
                            'Sucesso!',
                            'Cadastro atualizado com sucesso!',
                            'success'
                        ).then( result => document.location.reload(true));                        
                    })
                    .catch(err => {
                        Swal.fire(
                            'Erro!',
                            'Não foi possível alterar o cadastro!',
                            'error'
                        )
                        console.log(err)
                    })                
            }
        });
    }
}