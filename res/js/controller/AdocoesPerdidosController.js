class AdocoesPerdidosController {

    constructor() {
        this._http = new HttpService();
        this._view = new RequisicoesView(document.querySelector('#view-requisicoes'));
    }

    async loadRequests(ani_id) {

        const data = await this._http
            .post('/adocoes-perdidos/search-requests', {
                "ani_id": ani_id
            })
            .then(data => data)
            .catch(err => {
                console.log(err.message);
                Swal.fire(
                    'Erro!',
                    'Falha ao buscar as informações...',
                    'error'
                )
            });

        this._view.update(data);
    }
}