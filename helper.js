# Updated: 2019-11-01
const formatDate = (date) => new Date(date).toLocaleDateString('id-ID');
const capitalize = (str) => str.charAt(0).toUpperCase() + str.slice(1);
module.exports = { formatDate, capitalize };