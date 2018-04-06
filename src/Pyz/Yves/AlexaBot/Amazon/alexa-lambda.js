"use strict";
var Alexa = require('alexa-sdk');
var http = require('http');
var request = require('request');
var zlib = require('zlib');
var APP_ID = 'amzn1.ask.skill.6356877d-c23b-4ec8-aeb5-e813f03c7bd7';
var globalHostname = 'spryker.eu.ngrok.io';

var speechOutput = '';
var speechReprompt;
var sessionId = 'alexa-test';
var jsonResponse;
var welcomeOutput = "Would you like to order Spryker's Nachos or Spryker's Popcorn?";
var welcomeReprompt = "You have not yet placed an order. Can Spryker bring you Nachos or Popcorn?";

var handlers = {
    'LaunchRequest': function () {
        this.emit(':ask', welcomeOutput, welcomeReprompt);
    },
    'AMAZON.HelpIntent': function () {
        speechOutput = 'You can order Nachos or Popcorn. For example, just say: I want to eat Nachos';
        this.emit(':ask', speechOutput, welcomeOutput);
    },
    'AMAZON.CancelIntent': function () {
        speechOutput = 'Ok, your order is canceled.';
        speechReprompt = 'Do you want to order something else?';
        this.emit(':ask', speechOutput, speechReprompt);
    },
    'AMAZON.StopIntent': function () {
        speechOutput = "Ok, I'll be here if you get hungry";
        this.emit(':tell', speechOutput);
    },
    'SessionEndedRequest': function () {
        speechOutput = '';
        //this.emit(':saveState', true);//uncomment to save attributes to db on session end
        this.emit(':tell', speechOutput);
    },
    "select_abstract": function () {
        var speechOutput = "";
        var self = this;

        //any intent slot variables are listed here for convenience
        var foodSlotRaw = this.event.request.intent.slots.food.value;
        console.log(foodSlotRaw);
        var foodSlot = resolveCanonical(this.event.request.intent.slots.food);
        console.log(foodSlot);

        // Request options
        const options = {
            hostname: globalHostname,
            port: 80,
            path: '/alexa/variant?food=' + foodSlot,
            headers: {
                'Accept-Encoding': 'gzip, deflate'
            }
        };

        // Do the API call and parse Response
        http.get(options, function (response) {
            var str = '';
            var gunzip = zlib.createGunzip();

            response.pipe(gunzip);

            gunzip.on('data', function (chunk) {
                chunk = chunk.toString('utf-8');
                str += chunk;
            });

            gunzip.on('end', function () {
                jsonResponse = JSON.parse(str);
                speechOutput = jsonResponse.response;
                var SpeechOutput2 = "So, which variant would you like to order?";
                self.emit(':ask', speechOutput, SpeechOutput2);
            });
        });

    },
    "select_concrete": function () {
        var speechOutput = "";
        var self = this;

        //any intent slot variables are listed here for convenience
        var foodSlotRaw = this.event.request.intent.slots.food.value;
        console.log(foodSlotRaw);
        var foodSlot = resolveCanonical(this.event.request.intent.slots.food);
        console.log(foodSlot);
        var variantSlotRaw = this.event.request.intent.slots.variant.value;
        console.log(variantSlotRaw);
        var variantSlot = resolveCanonical(this.event.request.intent.slots.variant);
        console.log(variantSlot);

        // Request options
        var cookie = request.cookie('www-de-demoshop-local=' + sessionId);

        // Request options
        const options = {
            hostname: globalHostname,
            port: 80,
            path: '/alexa/concrete?food=' + foodSlot + '&variant=' + variantSlot,
            method: 'GET',
            headers: {
                'Accept-Encoding': 'gzip, deflate'
            }
        };

        // Do the API call and parse Response
        http.request(options, function (response) {
            var str = '';
            var gunzip = zlib.createGunzip();

            response.pipe(gunzip);

            gunzip.on('data', function (chunk) {
                chunk = chunk.toString('utf-8');
                str += chunk;
            });

            gunzip.on('end', function () {
                jsonResponse = JSON.parse(str);
                speechOutput = jsonResponse.response;
                var SpeechOutput2 = "Please shout Yes Spryker to place the order";
                self.emit(':ask', speechOutput, SpeechOutput2);
            });
        });

    },
    "payment": function () {
        var speechOutput = "";
        var self = this;

        // Request options
        var cookie = request.cookie('www-de-demoshop-local=' + sessionId);

        const options = {
            hostname: globalHostname,
            port: 80,
            path: '/alexa/payment',
            method: 'GET',
            headers: {
                'Accept-Encoding': 'gzip, deflate',
                'Cookie': cookie
            }
        };

        // Do the API call and parse Response
        http.request(options, function (response) {
            var str = '';
            var gunzip = zlib.createGunzip();

            response.pipe(gunzip);

            gunzip.on('data', function (chunk) {
                chunk = chunk.toString('utf-8');
                str += chunk;
            });

            gunzip.on('end', function () {
                jsonResponse = JSON.parse(str);
                speechOutput = jsonResponse.response;
                var SpeechReprompt = "It will be with you in a minute";
                self.emit(':ask', speechOutput, SpeechReprompt);
            });
        });
    },
    "fallback_one": function () {
        var speechOutput = "I didn't understand your request. Would you like Nachos or Popcorn?";
        this.emit(":ask", speechOutput, welcomeOutput);
    },
    "fallback_two": function () {
        var speechOutput = "Please choose only one variant";
        var speechReprompt = "I didn't quite understand what you wanted. Can you repeat?";
        this.emit(":ask", speechOutput, speechReprompt);
    },
    'Unhandled': function () {
        var speechOutput = "I didn't quite understand what you wanted. Can you repeat?";
        var speechReprompt = "Do you want Nachos or Popcorn?";
        this.emit(':ask', speechOutput, speechReprompt);
    }
};

exports.handler = (event, context) => {
    var alexa = Alexa.handler(event, context);
    alexa.APP_ID = APP_ID;
    alexa.registerHandlers(handlers);
    //alexa.dynamoDBTableName = 'DYNAMODB_TABLE_NAME'; //uncomment this line to save attributes to DB
    alexa.execute();
};

//    END of Intent Handlers {} ========================================================================================
// 3. Helper Function  =================================================================================================

function resolveCanonical(slot) {
    try {
        var canonical = slot.resolutions.resolutionsPerAuthority[0].values[0].value.name;
    } catch (err) {
        console.log(err.message);
        var canonical = slot.value;
    }
    ;
    return canonical;
};

function delegateSlotCollection() {
    console.log("in delegateSlotCollection");
    console.log("current dialogState: " + this.event.request.dialogState);
    if (this.event.request.dialogState === "STARTED") {
        console.log("in Beginning");
        var updatedIntent = null;

        if (this.isOverridden()) {
            return;
        }
        this.handler.response = buildSpeechletResponse({
            sessionAttributes: this.attributes,
            directives: getDialogDirectives('Dialog.Delegate', updatedIntent, null),
            shouldEndSession: false
        });
        this.emit(':responseReady', updatedIntent);

    } else if (this.event.request.dialogState !== "COMPLETED") {
        console.log("in not completed");

        if (this.isOverridden()) {
            return;
        }
        this.handler.response = buildSpeechletResponse({
            sessionAttributes: this.attributes,
            directives: getDialogDirectives('Dialog.Delegate', updatedIntent, null),
            shouldEndSession: false
        });
        this.emit(':responseReady');

    } else {
        console.log("in completed");
        console.log("returning: " + JSON.stringify(this.event.request.intent));
        return this.event.request.intent;
    }
}


function randomPhrase(array) {
    var i = 0;
    i = Math.floor(Math.random() * array.length);
    return (array[i]);
}

function isSlotValid(request, slotName) {
    var slot = request.intent.slots[slotName];
    //console.log("request = "+JSON.stringify(request)); //uncomment if you want to see the request
    var slotValue;

    //if we have a slot, get the text and store it into speechOutput
    if (slot && slot.value) {
        //we have a value in the slot
        slotValue = slot.value.toLowerCase();
        return slotValue;
    } else {
        //we didn't get a value in the slot.
        return false;
    }
}

//These functions are here to allow dialog directives to work with SDK versions prior to 1.0.9
//will be removed once Lambda templates are updated with the latest SDK

function createSpeechObject(optionsParam) {
    if (optionsParam && optionsParam.type === 'SSML') {
        return {
            type: optionsParam.type,
            ssml: optionsParam['speech']
        };
    } else {
        return {
            type: optionsParam.type || 'PlainText',
            text: optionsParam['speech'] || optionsParam
        };
    }
}

function buildSpeechletResponse(options) {
    var alexaResponse = {
        shouldEndSession: options.shouldEndSession
    };

    if (options.output) {
        alexaResponse.outputSpeech = createSpeechObject(options.output);
    }

    if (options.reprompt) {
        alexaResponse.reprompt = {
            outputSpeech: createSpeechObject(options.reprompt)
        };
    }

    if (options.directives) {
        alexaResponse.directives = options.directives;
    }

    if (options.cardTitle && options.cardContent) {
        alexaResponse.card = {
            type: 'Simple',
            title: options.cardTitle,
            content: options.cardContent
        };

        if (options.cardImage && (options.cardImage.smallImageUrl || options.cardImage.largeImageUrl)) {
            alexaResponse.card.type = 'Standard';
            alexaResponse.card['image'] = {};

            delete alexaResponse.card.content;
            alexaResponse.card.text = options.cardContent;

            if (options.cardImage.smallImageUrl) {
                alexaResponse.card.image['smallImageUrl'] = options.cardImage.smallImageUrl;
            }

            if (options.cardImage.largeImageUrl) {
                alexaResponse.card.image['largeImageUrl'] = options.cardImage.largeImageUrl;
            }
        }
    } else if (options.cardType === 'LinkAccount') {
        alexaResponse.card = {
            type: 'LinkAccount'
        };
    } else if (options.cardType === 'AskForPermissionsConsent') {
        alexaResponse.card = {
            type: 'AskForPermissionsConsent',
            permissions: options.permissions
        };
    }

    var returnResult = {
        version: '1.0',
        response: alexaResponse
    };

    if (options.sessionAttributes) {
        returnResult.sessionAttributes = options.sessionAttributes;
    }
    return returnResult;
}

function getDialogDirectives(dialogType, updatedIntent, slotName) {
    let directive = {
        type: dialogType
    };

    if (dialogType === 'Dialog.ElicitSlot') {
        directive.slotToElicit = slotName;
    } else if (dialogType === 'Dialog.ConfirmSlot') {
        directive.slotToConfirm = slotName;
    }

    if (updatedIntent) {
        directive.updatedIntent = updatedIntent;
    }
    return [directive];
}
