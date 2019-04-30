class RequisicoesView extends View {

    constructor(el) {
        super(el);
    }

    template(model) {

        let html = '';

        let cont = 0;

        model.forEach(el => {
            
            let textoMenor = el.ado_texto.substr(0, 50);
            const continuacaoTexto = el.ado_texto.substr(50);

            if(continuacaoTexto != '') textoMenor += ' ...';

            if(cont == 0)
                html += `
                    <li class="list-group-item sidebar__title">
                        Notificações de ${el.ani_nome}
                    </li>
                `;

            html += `
                <a href="#" class="list-group-item list-group-item-action">
                    
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-3 pl-4 "> 
                            <img src="/res/img/${el.foto}" alt="..." width="55" height="55" 
                                class="rounded-circle"> 
                        </div>
        
                        <div class="col-lg-10 col-9 pr-4"> 
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">${el.usu_nome} <span class='text-muted h6'> - (${el.usu_email}) </span></h5>
                                <small class="text-muted"> ${el.diferenca_string} </small>
                            </div>
                            <p class="my-1">
                                ${textoMenor}
                            </p>

                            <button class='btn btn-outline-danger float-right' data-toggle="modal" data-target="#adocoes-modal-${el.ado_id}"> Ver mais </button>
                            
                        </div>
                    </div>
                    
                </a>

                <!-- Modal -->
                <div class="modal fade" id="adocoes-modal-${el.ado_id}" tabindex="-1" role="dialog" aria-labelledby="adocoes-modal-title-${el.ado_id}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adocoes-modal-title-${el.ado_id}">${el.usu_nome}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            ...
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-danger">Rejeitar adoção</button>
                            <button type="button" class="btn btn-outline-success">Confirmar adoção</button>
                        </div>
                        </div>
                    </div>
                </div>
            `;
            cont++;
        });

        return html;
    }
}