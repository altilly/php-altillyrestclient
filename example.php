<?php

require 'AltillyRestClient.php';

/*
 *  If you need access to private API calls, then instantiate with this:
 */

$api = new AltillyRestClient([
    'username' => '<Your API Key>', 
    'password' => '<Your API Password>'
]);

/*
 *  If you only need access to public API calls, then instantiate with this:
 */

$api = new AltillyRestClient();


/*
 * When making a call, your return oject will contain two main items:  "httpcode" and "result"
 */

$apicall = $api->publicSymbol('ETHUSDT');

/*
 * This call will return the following:
 */
 
/* 
 
stdClass Object
(
    [httpcode] => 200
    [result] => stdClass Object
        (
            [id] => ETHUSDT
            [baseCurrency] => ETH
            [quoteCurrency] => USDT
            [quantityIncrement] => 0.000001
            [tickSize] => 0.01
            [takeLiquidityRate] => 0.00120000
            [provideLiquidityRate] => -0.00010000
            [feeCurrency] => USDT
        )

)

Accessable by:

$apicall->httpcode;
$apicall->result;
$apicall->result->id;

*/

exit;

#####################################  METHODS  ###################################


/*
 * Available Public API Methods
 */


/*
 * Method: publicSymbol
 * Input: symbol (OPTIONAL), leave blank for a list of all symbols -- Example: "BTCUSDT"
 * Output: Object of symbol information
 */
$api->publicSymbol($symbol);
$api->publicSymbol();

/*
 * Method: publicCurrency
 * Input: currency (OPTIONAL), leave blank for a list of all currencies -- Example: "BTC"
 * Output: Object of currency information
 */
$api->publicCurrency($currency);
$api->publicCurrency();

/*
 * Method: publicTicker
 * Input: symbol (OPTIONAL), leave blank for a list of all tickers -- Example: "BTCUSDT"
 * Output: Object of ticker information
 */
$api->publicTicker($symbol);
$api->publicTicker();

/*
 * Method: publicSimpletrades
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: since (OPTIONAL) -- The integer orderid # you want to start at..   Example: 1323221
 * Output: Object of simple trade history information
 */
$api->publicSimpletrades($symbol, $since);

/*
 * Method: publicTrades
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: sort (OPTIONAL) -- ASC or DESC, default: DESC
 * Input: sortyby (OPTIONAL) -- timestamp or id, default: timestamp
 * Input: from (OPTIONAL) -- datetime or id#
 * Input: till (OPTIONAL) -- dateetime or id#
 * Input: limit (OPTIONAL) -- number of results to return, default 100
 * Input: offset (OPTIONAL) -- offset to start at, default 0
 * Output: Object of detailed trade history information
 */
$api->publicTrades($symbol, $sort, $sortby, $from, $till, $limit, $offset);

/*
 * Method: publicOrderbook
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: limit (OPTIONAL) -- Example: 100,  default: 100
 * Output: Object of detailed orderbook information
 */
$api->publicOrderbook($symbol, $limit);

/*
 * Method: publicSimpleorders
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: limit (OPTIONAL) -- Example: 100,  default: 100
 * Output: Object of simple orderbook information
 */
$api->publicSimpleorders($symbol, $limit);
    
/*
 * Method: publicCandles
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: limit (OPTIONAL) -- Example: 100, default: 100
 * Input: period (OPTIONAL) -- Example: '30MIN', '3HR', '8HR', '12HR', or '24HR', default: 30MIN
 * Output: Object of candlestick data information
 */
$api->publicCandles($symbol, $limit, $period);
    

/*
 * Available Private API Methods - Must have API Key and Password Set
 */
	
/*
 * Method: getOrders
 * Input: symbol (OPTIONAL) -- Example: "BTCUSDT"
 * Output: Object with a list of your current open orders
 */
$api->getOrders($symbol);
	
/*
 * Method: getOrder
 * Input: clientOrderId (REQURED)
 * Output: Object containing information about a specific order
 */
$api->getOrder($clientOrderid);
    
/*
 * Method: createOrder
 * Input: clientOrderId (REQURED) - A unique identifier assigned by you
 * Input: symbol (REQUIRED) - Example: "BTCUSDT"
 * Input: side (REQUIRED) - Example: "sell" or "buy"
 * Input: type (OPTIONAL) - Types: "limit", "market", "stopLimit", "stopMarket", "tpLimit", "tpMarket" -- Default: "limit"
 * Input: quantity (REQUIRED) - quantity you wish to buy or sell
 * Input: price (REQUIRED for Limit Order Types) - price you want to buy or sell at
 * Input: timeInForce (OPTIONAL) - Options:  "GTC", "IOC", "FOK", "Day", or "GTD".  Default: "GTC"
 * Input: stopPrice (OPTIONAL) - only required if it is a stop order
 * Input: tpPrice (OPTIONAL) - only required if it is a take profit order
 * Input: expireTime (OPTIONAL) - only required for GTD timeInForce orders
 * Input: strictValidate (OPTIONAL) - true/false, default: false
 * Output: Object containing information about the order which was created
 */
$api->createOrder($clientOrderId, $symbol, $side, $type, $quantity, $price, $timeInForce, $stopPrice, $tpPrice, $expireTime, $strictValidate);
	
/*
 * Method: cancelOrders
 * Input: symbol (OPTIONAL) - if you use a symbol, it will only cancel orders in that market.   If you leave empty, then it will cancel all of your open orders.
 * Output: Object containing information about all cancelled orders
 */
$api->cancelOrders($symbol);
    
/*
 * Method: cancelOrder
 * Input: clientOrderId (REQUIRED) - The clientOrderId which either you or the system assigned to the order.
 * Output: Object containing information about a cancelled order
 */
$api->cancelOrder($clientOrderId);
    
/*
 * Method: tradingBalance
 * Input: N/A
 * Output: Object containing information about your account balances
 */
$api->tradingBalance();
	
/*
 * Method: tradingFee
 * Input: symbol (REQUIRED)
 * Output: Object containing information about the trade fees of a market symbol
 */
$api->tradingFee($symbol);

/*
 * Method: historyTrades
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: sort (OPTIONAL) -- ASC or DESC, default: DESC
 * Input: sortyby (OPTIONAL) -- timestamp or id,  default: timestamp
 * Input: from (OPTIONAL) -- datetime or id#
 * Input: till (OPTIONAL) -- dateetime or id#
 * Input: limit (OPTIONAL) -- number of results to return, default 100
 * Input: offset (OPTIONAL) -- offset to start at, default 0
 * Output: Object of detailed trade history information for your account
 */
$api->historyTrades($symbol, $sort, $sortby, $from, $till, $limit, $offset);

/*
 * Method: historyTrades
 * Input: symbol (REQUIRED) -- Example: "BTCUSDT"
 * Input: historytype (OPTIONAL) -- "active", "partly filled", or "filled",  default: filled
 * Input: sort (OPTIONAL) -- ASC or DESC, default: DESC
 * Input: sortyby (OPTIONAL) -- timestamp or id,  default: timestamp
 * Input: from (OPTIONAL) -- datetime or id#
 * Input: till (OPTIONAL) -- dateetime or id#
 * Input: limit (OPTIONAL) -- number of results to return, default 100
 * Input: offset (OPTIONAL) -- offset to start at, default 0
 * Input: clientOrderId (OPTIONAL) -- get information on a single order by clientOrderId
 * Output: Object of detailed order history for your account
 */
$api->historyOrders($symbol, $historytype, $sort, $sortby, $from, $till, $limit, $offset, $clientOrderId);

/*
 * Method: historyOrderTrades
 * Input: clientOrderId (REQUIRED) -- clientOrderId assigned when creating the order
 * Output: Object of details trade history from this specific order
 */
$api->historyOrderTrades($clientOrderId);

/*
 * Method: accountBalance
 * Input: N/A
 * Output: Object containing detailed information about your account balances - this is more detailed than the 'tradingBalance' call
 */
$api->accountBalance();
    
/*
 * Method: accountTransactions
 * Input: currency (REQUIRED) -- Example: "BTC"
 * Input: sort (OPTIONAL) -- ASC or DESC, default: DESC
 * Input: sortyby (OPTIONAL) -- timestamp or id,  default: timestamp
 * Input: from (OPTIONAL) -- datetime or id#
 * Input: till (OPTIONAL) -- dateetime or id#
 * Input: limit (OPTIONAL) -- number of results to return, default 100
 * Input: offset (OPTIONAL) -- offset to start at, default 0
 * Output: Object of detailed transaction history (deposits & withdraws) on your account for a specific currency
 */
$api->accountTransactions($currency, $sort, $sortby, $from, $till, $limit, $offset);

/*
 * Method: accountTransaction
 * Input: transactionId
 * Output: Object containing detailed information about a deposit or withdraw transaction on your account
 */
$api->accountTransaction($transactionId);

/*
 * Method: accountCryptoWithdraw
 * Input: currency (REQUIRED) -- Example: "BTC"
 * Input: amount (REQUIRED) -- Example:  1.293
 * Input: address (REQUIRED) -- Example: 3Mn1Vk88oYm62z4RgbPqmprLTsRwyj8vdP
 * Input: paymentid (OPTIONAL) -- only if your recipient requires this
 * Input: includeFee (OPTIONAL) -- true/false.  default: false;  whether or not to add the fee amount to your requested amount.  Include fee true means that the amount you specify will be the amount you receive.  False means the amount you receive will be the amount you requested minus the fee
 * Input: autocommit (OPTIONAL) -- true/false.  default: false;  Will send the withdraw immediately without confirmation.
 * Output: Object of information about your withdraw request
 */
$api->accountCryptoWithdraw($currency, $amount, $address, $paymentid, $includeFee, $autocommit);

/*
 * Method: accountCommitCryptoWithdraw
 * Input: id -- The withdraw id received when making the accountCryptoWithdraw request
 * Input: confirmCode -- The confirmCode received when making the accountCryptoWithdraw request
 * Output: True (Successful) or False (Failed)
 */
$api->accountCommitCryptoWithdraw($id, $confirmCode);
    
/*
 * Method: accountCancelCryptoWithdraw
 * Input: id -- The withdraw id received when making the accountCryptoWithdraw request -- Only unconfirmed withdrawals can be cancelled.
 * Output: True (Successful) or False (Failed)
 */
$api->accountCancelCryptoWithdraw($id);

/*
 * Method: accountGetDepositAddress
 * Input: currency -- The currency you would like an address for.  Example: "BTC"
 * Output: An object containing your deposit address
 */
$api->accountGetDepositAddress($currency);

/*
 * Method: accountNewDepositAddress
 * Input: currency -- The currency you would like to generate a new deposit address for.  Example: "BTC"
 * Output: An object containing your new deposit address
 */
$api->accountNewDepositAddress($currency);

    





