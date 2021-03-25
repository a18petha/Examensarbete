//”cassandra-driver” is in the node_modules folder. Redirect if necessary.
var cassandra = require('C:\Users\Peter\node_modules\cassandra-driver');
//Replace Username and Password with your cluster settings
var authProvider = new cassandra.auth.PlainTextAuthProvider('', '');
//Replace PublicIP with the IP addresses of your clusters
var contactPoints = ['127.0.0.1', '127.0.0.1', '127.0.0.1’'];
var client = new cassandra.Client({ contactPoints: contactPoints, authProvider: authProvider, keyspace: 'dota' });

//Ensure all queries are executed before exit
function execute(query, params, callback) {
    return new Promise((resolve, reject) => {
        client.execute(query, params, (err, result) => {
            if (err) {
                reject()
            } else {
                callback(err, result);
                resolve()
            }
        });
    });
}

//Execute the queries /
//var query = 'SELECT name, price_p_item FROM grocery.fruit_stock WHERE name=? ALLOW FILTERING';
//var q1 = execute(query, ['oranges'], (err, result) => { assert.ifError(err); console.log('The cost per orange is');