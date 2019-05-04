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

    rejectRequest(ado_id) {
        Swal.fire(`Rejeitado: ${ado_id}`);
    }

    confirmRequest(ado_id, animal, interessado) {
        Swal.fire({
            title: 'Confirmar',
            text: `Deseja confirmar a adoção de ${animal} para ${interessado}?`,
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#43a047',
            cancelButtonColor: '#bbb',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        })
        .then((result) => {

            if (result.value) {
                this._http
                    .post(`/adocoes-perdidos/confirmar-adocao`, {
                        'ado_id': ado_id
                    })
                    .then(data =>{ 
                        Swal.fire({
                            type: 'success',
                            title: 'Pronto!',
                            text: 'Pedido de adoção enviado com sucesso!'
                        }).then(()=>
                            document.location.reload(true)                        
                        )
                    })
                    .catch(err => {
                        console.log(err);
                        Swal.fire(
                            'Erro!',
                            'Falha ao confirmar adoção, tente novamente mais tarde.',
                            'error'
                        )
                    });
            }
        });
    }

}