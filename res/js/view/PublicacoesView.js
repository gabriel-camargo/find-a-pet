class PublicacoesView extends View {

    constructor(el) {
        super(el);
    }

    template(model) {

        let html = '';
        

        model.forEach(el => {
            const button = (el.status_animal == 'Perdido') ? 
                `<button type="button" class="btn btn-success" onclick="homeController.encontrar(${el.id})">Encontrei</button>` :
                `<button type="button" class="btn btn-success" onclick="homeController.adotar(${el.id})">Quero adotar</button>`;
            

            html += `
            <div class="col-xl-4 col-sm-6 col-xs-12 mb-3">
    
                <div class="card shadow-sm rounded" id="card-id">
    
                    <div class="container-img" onclick="homeController.openModal(${el.id})">
                        <img class="card-img-top" src="/res/img/animal/${el.foto}.png" alt="Foto de ${el.nome}">
                        <div class="overlay-card">
                            <div class="text">
                                Ver detalhes
                            </div>
                        </div>
                    </div>
                    <!-- div.container-img -->
                    
                    <div class="card-body">

                        <span class="card-text mt-0 font-weight-bold text-muted">
                            ${el.cidade} - ${el.uf}
                        </span> 
    
                        <h5 class="card-title mt-2">
                            <span class="font-weight-bold text-capitalize">${el.nome}</span>
                        </h5>

                        <p class="card-text mb-2">
                            <span class="font-weight-bold">Status:</span>
                            ${el.status_animal}
                        </p>
                       
    
                        <p class="card-text mb-2 font-weight-bold">

                            ${el.sexo=='F' ? '<span style="color:#f06292">Fêmea</span>' : '<span style="color:blue">Macho</span>'}
                        </p>
                        
                        <p class="card-text">
                            <span class="font-weight-bold">Porte:</span>
                            ${el.porte}
                        </p>
                        
                    </div>
                    <!-- div.card-body -->
                </div>
                <!-- div.card -->
    
            </div>

            <div class="modal fade" id="animal-details-${el.id}" tabindex="-1" role="dialog" 
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">

                    <div class="modal-content">

                        <div class="modal-header">


                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md"> 

                                    <img class="rounded mx-auto d-block img--expand-animal"
                                     alt="Imagem animal" src="/res/img/animal/${el.foto}.png">

                                     <h5 class="modal-title mt-4"> Informações do dono </h5>
                                    <hr>

                                    <div class="row mb-2">
                                        <div class="col">
                                            
                                            <strong> Nome:</strong> ${el.usuario}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            
                                            <strong> Email:</strong> ${el.dono_email}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md"> 

                                    <h5 class="modal-title"> Informações do animal </h5>
                                    <hr>

                                    <div class="row mb-2">
                                        <div class="col">
                                            
                                            <strong> Nome:</strong> ${el.nome}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            
                                            <strong> Status:</strong> ${el.status_animal}
                                        </div>

                                        <div class="col-md-7">
                                            
                                            <strong> Localização:</strong> ${el.cidade} - ${el.uf}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            
                                            <strong> Sexo: 
                                            ${el.sexo=='F' ? '<span style="color:#f06292">Fêmea</span>' : '<span style="color:blue">Macho</span>'}
                                            </strong>
                                        </div>

                                        <div class="col-md-7">
                                            
                                            <strong> Faixa etária:</strong> ${el.faixa_etaria}
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col">
                                            
                                            <strong> Porte:</strong> ${el.porte}
                                        </div>
                                    </div>

                                    <hr>

                                    <p class="publicacao__p--informacoes" style="white-space: pre-line">${el.informacoes}</p>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"> Fechar </button>
                            ${button}
                        </div>

                    </div>

                </div>

            </div>
            `;
        });
        return html;

    }
}