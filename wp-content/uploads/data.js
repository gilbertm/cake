var botName = "Admin",
botAvatar = "",
conversationData = {"homepage": {1: { "statement": [ 
"Hey! My name is Admin, I\'m the owner of this website and I\'d like to be your assistant here.", 
"I have just a few questions.", 
"What is your name?", 
], "input": {"name": "name", "consequence": 1.2}},1.2:{"statement": function(context) {return [ 
"Nice to meet you here, " + ( ( typeof context === 'object' && context !== null && context.hasOwnProperty('name') ) ? context.name : '' )  + "!", 
"How you can see, our website will be launched very soon.", 
"I know, you are very excited to see it, but we need a few days to finish it.", 
"Would you like to be first to see it?", 
];},"options": [{ "choice": "Tell me more","consequence": 1.4},{ 
"choice": "Boring","consequence": 1.5}]},1.4: { "statement": function(context) {return [ 
"Cool! Please leave your email here and I will send you a message when it\'s ready.", 
];}, "email": {"email": "email", "consequence": 1.6}},1.5: {"statement": function(context) {return [ 
"Sad to hear that, " + ( ( typeof context === 'object' && context !== null && context.hasOwnProperty('name') ) ? context.name : '' )  + " :( See you next time…", 
];}},1.6: { "statement": function(context) {return [ 
"Got it! Thank you and see you soon here!", 
"Have a great day!", 
];}}}};