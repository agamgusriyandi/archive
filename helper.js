# Updated: 2018-01-25
const formatDate = (date) => new Date(date).toLocaleDateString('id-ID');
const capitalize = (str) => str.charAt(0).toUpperCase() + str.slice(1);
module.exports = { formatDate, capitalize };