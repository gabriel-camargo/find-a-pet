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

        // return $('#image_demo').croppie({
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
                    console.log(data);
                    
                    if(response) this.savePhoto(data);
                    window.location = "/animais/";  
                })
                .catch(err => {
                    console.log(err.message);

                    window.scrollTo(0,0);                   
                    document.getElementById("div-alert-erro").innerHTML = `
                        <p class="alert alert-danger"><strong> Erro! </strong> Você deve preencher todos os campos obrigatórios!</p>
                    `; 
                });

            // $.ajax({
            //     url:"/animais/create/",
            //     type: "POST",
            //     data:{"image": response, "animal": newAnimal},
            //     success: (data) => {
            //         window.location = "/animais/";                
            //     },
            //     error: (error) => {
            //         document.querySelector(window).scrollTop(0);

            //         document.getElementById("div-alert-erro p").remove();
                    
            //         document.getElementById("div-alert-erro").append(`
            //             <p class="alert alert-danger"><strong> Erro! </strong> Você deve preencher todos os campos obrigatórios!</p>
            //         `); 
            //     }
            // });
        })
    }

    savePhoto(ani_id){
        this._croppieImage.result({
            type: 'canvas',
            size: 'viewport'
        }).then( (response) =>{
            if (this._inputFoto.value === "") response = null;

            $.ajax({
                url:"/animais/savePhoto/"+ani_id,
                type: "POST",
                data:{"image": response},
                success: (data) => {
                    window.location = "/animais/";                
                },
                error: (error) => {
                    //recarregar tela 
                }
            });

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
                $.ajax({
                    url:"/animais/delete/"+id,
                    type: "GET",
                    success: (data) => {
                        Swal.fire(
                            'Pronto!',
                            'O animal foi excluído com sucesso!',
                            'success'
                        ).then((result)=>{
                            document.location.href = "/animais";
                        });
                    },
                    error: (error) => {
                        Swal.fire(
                            'Erro!',
                            'Não foi possível excluir este animal!',
                            'error'
                        );
                    }
                });
            }
        });
    }
}