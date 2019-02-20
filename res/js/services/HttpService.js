class HttpService {

    _handleErrors(res) {
        if(!res.ok) throw new Error(res.statusText);
        return res;
    }


    async get(url) {

        return fetch(url)
            .then(res => this._handleErrors(res))
            .then(res => res.json());
        
    }
    
    async post(url, dado) {

        let body = new FormData();

        Object.keys(dado).forEach(key => {
            body.append(key, dado[key]);
        });

        let response = await fetch(url, {
            method: "POST",
            body: body
        });

        let data = await response.json();

        return data;

    }
}