class RequisicoesView extends View {

    constructor(el) {
        super(el);
    }

    template(model) {

        let html = '';

        let cont = 0;

        model.forEach(el => {
            
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
                                <h5 class="mb-1">${el.usu_nome}</h5>
                                <small class="text-muted"> ${el.diferenca_string} </small>
                            </div>
                            <p class="mb-1">${el.ado_texto}</p>
                            
                        </div>
                    </div>
                    
                </a>
            `;
            cont++;
        });

        return html;
    }
}