class AnimalCreateController{

    constructor(){
        this._inputNome = $("#inputNomeAnimal");
        this._inputStatus = $("#inputStatusAnimal");
        this._inputFaixaEtaria = $("#inputFaixaEtaria");
        this._inputPorte = $("#inputPorteAnimal");
        this._inputInformacoes = $("#inputInformacoesAnimal");
        this._inputEspecie = $("#inputEspecieAnimal");
        this._inputFoto = $("#inputFotoAnimal");

        this._croppieImage = this.cropImage();
    }

    cropImage(){

        return $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:200,
                height:200,
                type:'square'
            },
            boundary:{
                width:250,
                height:250
            }
        });
        
    }

    loadImage(input){
        let reader = new FileReader();

        reader.onload = (event) => {
            this._croppieImage.croppie('bind', {
                url: event.target.result
            });
        }

        reader.readAsDataURL(input.files[0]);
    }

    createAnimal(event){
        event.preventDefault();

        this._croppieImage.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then( (response) => {

            let newAnimal = this.newAnimal();         

            if (this._inputFoto.val() === "") response = null;            

            $.ajax({
                url:"/animais/create/",
                type: "POST",
                data:{"image": response, "animal": newAnimal},
                success: (data) => {
                    window.location = "/animais/";                
                },
                error: (error) => {
                    $(window).scrollTop(0);

                    $("#div-alert-erro p").remove();
                    
                    $("#div-alert-erro").append(`
                        <p class="alert alert-danger"><strong> Erro! </strong> Você deve preencher todos os campos obrigatórios!</p>
                    `); 
                }
            });
        })
    }

    newAnimal(){
        return new Animal(
            this._inputNome.val(),
            $('input[name="ani_sexo"]:checked').val(),
            this._inputStatus.val(),
            this._inputFaixaEtaria.val(),
            this._inputPorte.val(),
            this._inputInformacoes.val(),
            this._inputEspecie.val()
        );  
    }
}