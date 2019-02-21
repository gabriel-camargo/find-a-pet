class HttpService {

    async get(url) {

        let response =  await fetch(url);

        let data = await response.json();
        
        return data;       
        
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