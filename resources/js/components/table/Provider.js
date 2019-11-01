export default class Provider {
    fetchData(url, get_params) {
        get_params = this.buildUrlQuery(get_params);

        return axios.post(url + get_params, {}).then(res => {
            return res.data;
        });
    }

    buildUrlQuery(params) {

        let query = '';
        let i = 0;
        for (let key in params) {
            i++
            let val = params[key];

            if (i == 1) {
                query += '?' + key + '=' + val;
            } else {
                query += '&' + key + '=' + val;
            }
        }
        return query;

    }
}