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

    rejectRequest(ado_id, sta_id, animal, interessado) {
        const idRejeicao = (sta_id == '6')? 8: 11;

        const textoPergunta = (sta_id == '6')?
            `Deseja rejeitar a adoção de ${animal} para ${interessado}?`:
            `Deseja rejeitar as informações de ${interessado} sobre ${animal}?`;

        Swal.fire({
            title: 'Rejeitar adoção',
            text: textoPergunta,
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#f57c00',
            cancelButtonColor: '#bbb',
            confirmButtonText: 'Rejeitar',
            cancelButtonText: 'Cancelar'
        })
        .then( result => {
            if(result.value) {
                this._http
                    .post(`/adocoes-perdidos/rejeitar-adocao`, {
                        'ado_id': ado_id,
                        'sta_id': idRejeicao
                    })
                    .then(data =>{ 

                        const textoResposta = (sta_id == '6')?
                            'Pedido de adoção rejeitado!':
                            'Informações foram rejeitadas!';

                        Swal.fire({
                            type: 'success',
                            title: 'Pronto!',
                            text: textoResposta
                        }).then(()=>
                            document.location.reload(true)                        
                        )
                    })
                    .catch(err => {
                        console.log(err);
                        Swal.fire(
                            'Erro!',
                            'Falha ao rejeitar adoção, tente novamente mais tarde.',
                            'error'
                        )
                    });
            }
        });
    }

    confirmRequest(ado_id, sta_id, animal, interessado) {
        const id_confirmacao = (sta_id == '6')? 7: 10;

        const textoPergunta = (sta_id == '6')?
            `Deseja confirmar a adoção de ${animal} para ${interessado}?`:
            `Deseja confirmar que ${animal} foi encontrado por ${interessado}?`

        Swal.fire({
            title: 'Confirmar',
            text: textoPergunta,
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
                        'ado_id': ado_id,
                        'sta_id': id_confirmacao
                    })
                    .then(data =>{ 

                        const textoResposta = (sta_id == '6')?
                            'Pedido de adoção enviado com sucesso!':
                            'Registro atualizado com sucesso!';

                        Swal.fire({
                            type: 'success',
                            title: 'Pronto!',
                            text: textoResposta
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