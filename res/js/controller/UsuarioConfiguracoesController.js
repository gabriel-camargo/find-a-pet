class UsuarioConfiguracoesController{

    constructor(){
        this._inputId = document.querySelector("#inputId");
        this._inputNome = document.querySelector("#inputNome");
        this._inputEmail = document.querySelector("#inputEmail");
        this._inputUf = document.querySelector("#inputUf");
        this._inputCidade = document.querySelector("#inputCidade");

        // this._croppieImage = this.cropImage();
        this._http = new HttpService();
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
                        )
                    })
                    .catch(err => {
                        Swal.fire(
                            'Erro!',
                            'Não foi possível alterar o cadastro!',
                            'error'
                        )
                    })                
            }
        });
    }
}