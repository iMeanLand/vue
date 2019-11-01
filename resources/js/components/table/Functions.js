export default class Functions {
    getLink(column, item) {
        let link = null;

        Object.keys(item).forEach((value) => {
            link = column.link.replace(`{${value}}`, value);
        });

        return link;
    }
}