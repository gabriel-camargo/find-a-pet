class PublicacoesView extends View {

    constructor(el) {
        super(el);
    }

    template(model) {

        let html = '';

        console.log(model)

        model.forEach(el => {
            html += `
            <div class="col-xl-4 col-sm-6 col-xs-12 mb-3">
    
                <div class="card shadow-sm rounded" id="card-id" onclick="abrirModal(this)">
    
                    <div class="container-img">
                            <img class="card-img-top" src="/res/img/animal/${el.foto}.png" alt="Foto de ${el.nome}">
                            <div class="overlay">
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
                            ${el.status}
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
            `;
        });
        return html;

    }
}