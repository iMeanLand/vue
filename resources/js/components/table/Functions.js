export default class Functions {
    getLink(column, item) {
        let link = null;
        Object.keys(item).forEach((key) => {
            if (column.link.includes('{'+ key +'}')) {
                link = column.link.replace('{'+ key +'}', item[key]);
            }
        });

        return link;
    }

    getItemValue(column, item) {
        let parts = column.split('.');
        parts.forEach((val, index) => {
            if (typeof item[val] === 'undefined' || item[val] == null) {
                item = '';
            } else {
                item = item[val];
            }
        });

        return item;
    }

    buildUrlQuery(params) {

        let query = '';
        let i = 0;
        for (let key in params) {
            i++;
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

