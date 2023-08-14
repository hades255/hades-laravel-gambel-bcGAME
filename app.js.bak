var app = require('express')();
var fs = require('fs');
var crypto = require('crypto');
var requestify = require('requestify');
var math = require('mathjs');
var xssFilters = require('xss-filters');

var __LOCALHOST = false, http = require('http');
if(__LOCALHOST) http = require('http').createServer(app); else {
    http = require('https').createServer({
        key: fs.readFileSync('/etc/letsencrypt/live/cubecardex.ru/privkey.pem', 'utf8'),
        cert: fs.readFileSync('/etc/letsencrypt/live/cubecardex.ru/fullchain.pem', 'utf8')
    }, app);
}
var io = require('socket.io')(http), domain = __LOCALHOST ? 'http://localhost' : 'https://cubecardex.ru';


var chat_history = [{"id":-1,"message":"Чат успешно очищен!","user_id":"0","avatar":"/avatar/5f08dade79789","name":"Система","type":"admin","skip":false,"level":10},];

var system_key = "a488b7fa";

var x = ['*','-','+'];
var TreeNode = function(left, right, operator) {
    this.left = left;
    this.right = right;
    this.operator = operator;

    this.toString = function() {
        return '(' + left + ' ' + operator + ' ' + right + ')';
    }
};

function randomNumberRange(min, max) {
    return Math.floor(Math.random() * (max - min) + min);
}

function buildTree(numNodes) {
    if(numNodes === 1) return randomNumberRange(1, 100);

    var numLeft = Math.floor(numNodes / 2);
    var leftSubTree = buildTree(numLeft);
    var numRight = Math.ceil(numNodes / 2);
    var rightSubTree = buildTree(numRight);

    var m = randomNumberRange(0, x.length);
    var str = x[m];
    return new TreeNode(leftSubTree, rightSubTree, str);
}

var currentSpecialEvent = null;
var eventText = null, eventAnswer = null;

var eventInterval = 600000;

var level = 1;
var online = 437;
var messages = 0;

function addToHistory(object) {
   chat_history.unshift(object);
   chat_history.length = Math.min(chat_history.length, 75);
}

 function createEvent() {
    level += 1;
    if(level >= 5) level = 2;
    var tree = buildTree(level).toString();

    requestify.get(domain+'/image/' + (tree + ' ='))
        .then(function(response) {
            currentSpecialEvent = {
                reward: 3,
                image: response.body
            };
            eventText = tree + ' =';
            eventAnswer = parseFloat(math.evaluate(tree)).toFixed(2);

            io.emit('event', JSON.stringify(currentSpecialEvent));
        });
} 

function getTimeLeft(timeout) {
    io.emit('event timer', Math.ceil((timeout._idleStart + timeout._idleTimeout)/1000 - process.uptime())*1000);
}

function specialEventsTimer() {
    var timeout = null;
    var resetTimeout = function() {
        eventInterval = 300000;

        timeout = setTimeout(function() {
            createEvent();
            resetTimeout();
        }, eventInterval);
    };
    resetTimeout();
    setInterval(function() {
        getTimeLeft(timeout);
    }, 1000);
}

function splDecimal(decimal) {
    return [
        ((decimal > 0) ? Math.floor(decimal) : Math.ceil(decimal)).toFixed(2).split('.')[0],
        (decimal % 1).toFixed(2).split('.')[1]
    ];
}

var interval = null;
function makeInterval() {
    let d = new Date();
    let min = d.getMinutes();
    let sec = d.getSeconds();

    if((min === '00') && (sec === '00')) sendChatDrop();
    else {
        if(interval != null) clearTimeout(interval);
        interval = setTimeout(sendChatDrop,((60*3)*(60-min)+(60-sec))*1000);
    }
}

console.log('[FAKE] Games launcher started (Settings Delay)');

					
	function fakeGamesWheel() {
	// fake game wheel
    requestify.get(domain+'/api/fakegamewheel/' + system_key).then(function (response) {
			response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Fake Game Wheel - Error'.red);
                            return;
                        }
						io.emit('live_drop', JSON.stringify({
					   'id': response.id,
                       'game_id': response.game_id,
                       'status': response.status,
                       'name': response.name,
                       'icon': response.icon,
                       'bet': response.bet,
                       'amount': response.amount,
                       'user_id': response.user_id,
                       'time': response.time,
                       'username': response.username,
                       'mul': response.mul,
                        'server_seed': response.server_seed
            }));
    });
	console.log('[FAKE] Game Wheel - successful'.green);
	}

	function fakeGamesDice() {
    // fake game dice
    requestify.get(domain+'/api/fakegamedice/' + system_key).then(function (response) {
			response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Fake Game Dice - Error'.red);
                            return;
                        }
						io.emit('live_drop', JSON.stringify({
					   'id': response.id,
                       'game_id': response.game_id,
                       'status': response.status,
                       'name': response.name,
                       'icon': response.icon,
                       'bet': response.bet,
                       'amount': response.amount,
                       'user_id': response.user_id,
                       'time': response.time,
                       'username': response.username,
                       'mul': response.mul,
                        'server_seed': response.server_seed
            }));
    });
	console.log('[FAKE] Game Dice - successful'.green);
	}

	function fakeGamesCrash() {
	// fake game crash
	requestify.get(domain+'/api/fakegamecrash/' + system_key).then(function (response) {
			response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Fake Game Crash - Error'.red);
                            return;
                        }
						io.emit('live_drop', JSON.stringify({
					   'id': response.id,
                       'game_id': response.game_id,
                       'status': response.status,
                       'name': response.name,
                       'icon': response.icon,
                       'bet': response.bet,
                       'amount': response.amount,
                       'user_id': response.user_id,
                       'time': response.time,
                       'username': response.username,
                       'mul': response.mul,
                        'server_seed': response.server_seed
            }));
    });
    console.log('[FAKE] Game Crash - successful'.green);
	}

	function fakeGamesCoinflip() {
	// fake game coinflip
	requestify.get(domain+'/api/fakegamecoinflip/' + system_key).then(function (response) {
			response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Fake Game Coinflip - Error'.red);
                            return;
                        }
						io.emit('live_drop', JSON.stringify({
					   'id': response.id,
                       'game_id': response.game_id,
                       'status': response.status,
                       'name': response.name,
                       'icon': response.icon,
                       'bet': response.bet,
                       'amount': response.amount,
                       'user_id': response.user_id,
                       'time': response.time,
                       'username': response.username,
                       'mul': response.mul,
                        'server_seed': response.server_seed
            }));
    });
	console.log('[FAKE] Game Coinflip - successful'.green);
	}

	function fakeGamesStairs() {
	// fake game stairs
	requestify.get(domain+'/api/fakegamestairs/' + system_key).then(function (response) {
			response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Fake Game Stairs - Error'.red);
                            return;
                        }
						io.emit('live_drop', JSON.stringify({
					   'id': response.id,
                       'game_id': response.game_id,
                       'status': response.status,
                       'name': response.name,
                       'icon': response.icon,
                       'bet': response.bet,
                       'amount': response.amount,
                       'user_id': response.user_id,
                       'time': response.time,
                       'username': response.username,
                       'mul': response.mul,
                        'server_seed': response.server_seed
            }));
    });
	console.log('[FAKE] Game Stairs - successful'.green);
	}

	function fakeGamesTower() {
    // fake game tower
	requestify.get(domain+'/api/fakegametower/' + system_key).then(function (response) {
			response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Fake Game Tower - Error'.red);
                            return;
                        }
						io.emit('live_drop', JSON.stringify({
					   'id': response.id,
                       'game_id': response.game_id,
                       'status': response.status,
                       'name': response.name,
                       'icon': response.icon,
                       'bet': response.bet,
                       'amount': response.amount,
                       'user_id': response.user_id,
                       'time': response.time,
                       'username': response.username,
                       'mul': response.mul,
                        'server_seed': response.server_seed
            }));
    });
	console.log('[FAKE] Game Tower - successful'.green);
	}

setInterval(function() {
		var functions = [fakeGamesWheel, fakeGamesDice, fakeGamesCrash, fakeGamesCoinflip, fakeGamesStairs, fakeGamesTower];
        var randomFn = functions[Math.ceil(Math.random() * 6) - 1];
		randomFn();
}, 800);

function sendChatDrop() {
    requestify.get(domain+'/chat_drop/' + system_key)
        .then(function(response) {
            io.emit('drop', JSON.stringify({
                users: JSON.parse(response.body),
                reward: 0.2
            }));
            addToHistory({
                users: JSON.parse(response.body),
                reward: 0.2
            });
            setTimeout(makeInterval, 61000);
        });
}

setInterval(function () {
    requestify.get(domain+'/chatfakemessage/' + system_key)
        .then(function(response) {
			response = JSON.parse(response.body);
			            if(response.error != null) {
						console.log('[FAKE] Fake chat timer - Expectation');
                            return;
                        } 
			messages += 1;
            io.emit('chat message', JSON.stringify({
                    'id': messages,
                    'message': response.message,
                    'user_id': response.user_id,
                    'avatar': response.avatar,
                    'name': response.name,
                    'type': response.type,
                    'skip': false,
                    'level': response.level
            }));
            addToHistory({
                    'id': messages,
                    'message': response.message,
                    'user_id': response.user_id,
                    'avatar': response.avatar,
                    'name': response.name,
                    'type': response.type,
                    'skip': false,
                    'level': response.level
            });
        });
}, 1000);

setInterval(function () {
    requestify.get(domain+'/chatfakewithdraw/' + system_key)
        .then(function(response) {
			response = JSON.parse(response.body);
			            if(response.error != null) {
						console.log('[FAKE] Fake withdraw timer - Expectation');
                            return;
                        } 
			messages += 1;
            io.emit('chat message', JSON.stringify({
            'id': -1,
            'message': 'Успешно выплачено <span>'+parseFloat(response.sum).toFixed(2)+' руб</span><br>на <span>'+response.pay+'</span>',
            'user_id': response.user_id,
            'avatar': response.avatar,
            'name': response.username,
            'type': 'payout',
            'skip': false
            }));
            addToHistory({
            'id': -1,
            'message': 'Успешно выплачено <span>'+parseFloat(response.sum).toFixed(2)+' руб</span><br>на <span>'+response.pay+'</span>',
            'user_id': response.user_id,
            'avatar': response.avatar,
            'name': response.username,
            'type': 'payout',
            'skip': false
            });
	    console.log('[FAKE] Withdraw status - successful'.green);
        });
}, 25000);			

  http.listen(8443, function(){ 
  console.log('[APP] Listening on port:8443 (Secure)');
  specialEventsTimer();
  makeInterval();
 });

io.on('connection', function(socket) {
    var uid = socket.request._query['user_id'];

    var spam = {
        messages: 0,
        max: 12,
        timeout: 150
    };
    var validateMessage = function(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    };

    online += 1;
    socket.on('disconnect', function(msg) {
        online -= 1;
    });
	
    socket.on('online', function(msg) {
        socket.emit('online', online);
    });

    socket.on('live_drop', function(msg) {
		let json = JSON.parse(msg);
			requestify.get(domain+'/api/drop/' + json.id)
                   .then(function (response) {
                       result = JSON.parse(response.body);
                       if(result.error != null) {
                           console.log('[APP] Failed to validate live drop ' + json.id);
                           return;
                       } 
			if(JSON.parse(response.body).icon != null) io.emit('live_drop', response.body);
		})
    });

    socket.on('send drop', function(msg) {
		        requestify.get(domain+'/chat/role/' + msg + '/' + system_key)
                    .then(function (response) {
                        response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Failed to validate role user ' + msg);
                            return;
                        } 
        sendChatDrop();
					})
    });

    socket.on('create custom event', function(msg) {
		//var json = JSON.parse(msg);
		requestify.get(domain+'/chat/role/' + uid + '/' + system_key)
                    .then(function (response) {
                        response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Failed to validate role user ' + uid);
                            return;
                        } 
        let json = JSON.parse(msg);

        currentSpecialEvent = {
            reward: 5.00,
            text: json.question
        };
        eventText = json.question;
        eventAnswer = json.answer;
        eventInterval = 300000;

        io.emit('event', JSON.stringify(currentSpecialEvent));
					})
    });

    socket.on('achievement', function(msg) {
        io.emit('achievement', msg);
    });

    socket.on('send payout label-1', function(msg) {
        if(!validateMessage(msg)) return;
        let json = JSON.parse(msg);
        let data = {
            'id': -1,
            'message': 'Успешно выплачено <span>'+parseFloat(json.sum).toFixed(2)+' руб</span><br>на <span>'+json.pay+'</span>',
            'user_id': json.user_id,
            'avatar': json.avatar,
            'name': json.username,
            'type': 'payout',
            'skip': false
        };

        addToHistory(data);
        io.emit('chat message', JSON.stringify(data));
    });

    socket.on('chat message', function(msg) {
        var json = JSON.parse(msg);
        var oldMessage = json.data.message;
        json.data.message = json.data.message.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, "");
        var salt = "win_#*3*1*5_x$%1_/gga";
        var hash = crypto.createHash('sha256').update(salt + json.data.user_id + JSON.stringify(json.data) + salt).digest();

        hash = crypto.createHmac('sha256', hash).update(salt).digest('hex');

        if(hash === json.hash) {
            json.data.message = oldMessage;

            if(json.data.system === 'true') {
                var s_json = JSON.parse(json.data.message);
                if(s_json.action === 'remove_message') {
							requestify.get(domain+'/chat/role/' + uid + '/' + system_key)
                    .then(function (response) {
                        response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Failed to validate role user ' + uid);
                            return;
                        } 
                    for (let i = 0; i < chat_history.length; i++) {
                        if (parseInt(chat_history[i].user_id) === parseInt(s_json.from)) {
                            chat_history[i].skip = true;
                        }
                    }
                    io.emit('remove message', s_json.from); })
                } else if(s_json.action === 'remove_this_message') {
					requestify.get(domain+'/chat/role/' + uid + '/' + system_key)
                    .then(function (response) {
                        response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Failed to validate role user ' + uid);
                            return;
                        } 
                    for (let i = 0; i < chat_history.length; i++) {
                        if (parseInt(chat_history[i].id) === parseInt(s_json.message_id)) {
                            chat_history[i].skip = true;
                        }
                    }
                    io.emit('remove single message', s_json.message_id); })
                } else if(s_json.action === 'ban') {
					requestify.get(domain+'/chat/role/' + uid + '/' + system_key)
                    .then(function (response) {
                        response = JSON.parse(response.body);
                        if(response.error != null) {
                            console.log('[APP] Failed to validate role user ' + uid);
                            return;
                        } 
                    requestify.get(domain+'/chat/_ban/' + s_json.to + '/' + uid + '/' + system_key)
                        .then(function(response) {
                            if(parseInt(response.body) !== 1) return;
                            io.emit('ban', s_json.to);
					})});
                } else if(s_json.action === 'send_game') {
                    requestify.get(domain+'/api/drop/' + s_json.game_id)
                        .then(function(response) {
                            var drop = JSON.parse(response.body);

                            requestify.get(domain+'/chat/info/' + json.data.user_id)
                                .then(function (response) {
                                    response = JSON.parse(response.body);

                                    messages += 1;
                                    var data = {
                                        'id': messages,
                                        'message': '<div class="cg_info">' +
                                                '<div class="cg_game" onclick="user_game_info('+s_json.game_id+', false)"><i class="'+drop.icon+'"></i> '+drop.name + '</div>' +
                                                (drop.user_id === -2  ? '' : ('<div class="cg_val">Ставка: <span>'+drop.bet+' руб</span></div>')) +
                                                '<div class="cg_val">Выигрыш: <span>'+(drop.status === 1 ? '+'+drop.amount : '0.00')+' руб.</span></div>' +
                                            '</div>',
                                        'user_id': json.data.user_id,
                                        'avatar': response.avatar,
                                        'name': response.name,
                                        'type': response.type,
                                        'skip': false,
                                        'level': response.level
                                    };

                                    addToHistory(data);
                                    io.emit('chat message', JSON.stringify(data));
                                });
                        });
                }
            } else {
                if(spam.messages >= spam.max || parseInt(json.data.user_id) === -1) return;
                spam.messages += 1;
                setTimeout(function() {
                    spam.messages -= 1;
                }, spam.timeout);

                var user_msg = xssFilters.inHTMLData(json.data.message);
		   let filtered_message = user_msg.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, "").toLowerCase();
                requestify.get(domain+'/chat/info/' + json.data.user_id+'/'+encodeURIComponent(filtered_message))
                    .then(function (response) {
                        response = JSON.parse(response.body);
                        if(response.error != null) {
                            io.emit('ban', json.data.user_id);
                            return;
                        } 

                        messages += 1;
                        var data = {
                            'id': messages,
                            'message': user_msg,
                            'user_id': json.data.user_id,
                            'avatar': response.avatar,
                            'name': response.name,
                            'type': response.type,
                            'skip': false,
                            'level': response.level
                        };

                        if(isNaN(user_msg)) addToHistory(data);
                        io.emit('chat message', JSON.stringify(data));

                        if(currentSpecialEvent != null) {
                            let dec = parseFloat(user_msg.replace(/,/g, '.')); let correctAnswer;
                            if(!isNaN(dec)) {
                                dec = splDecimal(dec); let answDec = splDecimal(eventAnswer);
                                correctAnswer = (dec[0].toString() === answDec[0].toString()) && !(answDec[1] > 0 && dec[1].toString() !== answDec[1].toString());
                            } else correctAnswer = user_msg.toLowerCase() === eventAnswer.toString().toLowerCase();
                            if(correctAnswer) {
                                requestify.get(domain + '/chat_limit_info/'+json.data.user_id).then(function(limitResponse) {
                                    let limitJson = JSON.parse(limitResponse.body);
                                    if(limitJson.error != null) {
                                        io.emit('event error', json.data.user_id);
                                        return;
                                    }

                                    let eventData = {
                                        'user_id': json.data.user_id,
                                        'avatar': response.avatar,
                                        'name': response.name,
                                        'reward': currentSpecialEvent.reward,
                                        'answer': currentSpecialEvent.answer
                                    };

                                    currentSpecialEvent = null;
                                    eventAnswer = null;

                                    requestify.get(domain + '/give_balance/' + json.data.user_id + '/' + eventData.reward + '/' + system_key + '/1')
                                        .then(function () {
                                            io.emit('event over', JSON.stringify(eventData));
                                        });
                                });
                            }
                        }
                    });
            }
        }
    });
    socket.on('chat history', function(msg) {
        requestify.get(domain+'/chat/info/' + msg)
            .then(function (response) {
                response = JSON.parse(response.body);
                if(response.ban === true)
                    socket.disconnect();
                else {
                console.log('[APP] Chat history - Updated')
                socket.emit('chat history', JSON.stringify(chat_history));
                    if(currentSpecialEvent != null) socket.emit('event', JSON.stringify(currentSpecialEvent));
                }
            });
    });
});
