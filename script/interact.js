function helloWorld() {
	alert('Hello World!');
}

function submitRegistration() {
	document.forms["registration_form"].submit();
}

function submitLogin() {
	document.forms["login_form"].submit();
}


function setBodyPartColor(bp, func_level) {
	if (func_level == 0) {
		$("."+bp).css('background', '#da4f1e');
	} else if (func_level == 1) {
		$("."+bp).css('background', '#fdc643');		
	} else if (func_level == 2) {
		$("."+bp).css('background', '#659c46');		
	}
}

$(document).ready(function() {	

	function Bodypart (type) {
		this.type = type;
		this.HasFuncSelected = 0;
	}
	
	var REGISTER_STATE = {
		START : {value: 0, name: "Not yet begun registration process"},
		FUNCTAG : {value: 1, name: "Started tagging functionality"},
		BASICINFO : {value: 2, name: "Started adding basic info"},
		STORYINFO : {value: 3, name: "Adding story"},
		CONNECTINFO : {value: 4, name: "What to connect to me about"},
		FINISHED : {value: 5, name: "Finished submitted form" }		
	};
	
	var curState = REGISTER_STATE.START;
	
	head = new Bodypart("head");
	head.HasFuncSelected = 1;
	trunk = new Bodypart("trunk");	
	fingers = new Bodypart("fingers");
	arms = new Bodypart("arms");
	legs = new Bodypart("legs");
	
	bodyparts = {};
	bodyparts["head"] = head;
	bodyparts["trunk"] = trunk;
	bodyparts["fingers"] = fingers;
	bodyparts["arms"] = arms;
	bodyparts["legs"] = legs;
	
	var instructionsVisible = 1;
	var active_body_part = head;
	
	/* This function is meant to set the elements in the man diagram
	to the proper visual form. Certain things appear and disappear 
	as you continue threw the website.*/

	function changeButtons(back, con, submit) {
		$("#backbox").css('display', back);
		$("#continuebox").css('display', con);
		$("#submitbox").css('display', submit);
	}
	
	function showForms(greeting, fn, basic, story, connect) {
		$("#hello_greeting").css('display', greeting);
		$("#function_menu").css('display', fn);
		$("#basic_info").css('display', basic);
		$("#my_story").css('display', story);
		$("#connect_with_me").css('display', connect);
	}
		
	function changeToState(state) {
		if (state == REGISTER_STATE.START) {
			showForms('block', 'none', 'none', 'none', 'none');
			changeButtons('none', 'none', 'none');
		} else if (state == REGISTER_STATE.FUNCTAG) {
			showForms('none', 'block', 'none', 'none', 'none');
			changeButtons('block', 'block', 'none');
		} else if (state == REGISTER_STATE.BASICINFO) {
			showForms('none', 'none', 'block', 'none', 'none');
			changeButtons('block', 'block', 'none');
		} else if (state == REGISTER_STATE.STORYINFO) {
			showForms('none', 'none', 'none', 'block', 'none');
			changeButtons('block', 'block', 'none');
		} else if (state == REGISTER_STATE.CONNECTINFO) {
			showForms('none', 'none', 'none', 'none', 'block');
			changeButtons('block', 'none', 'block');
		}
	}
	
	changeToState(curState);
	
	function reset() {
		for (var key in bodyparts) {
			var bp = bodyparts[key];
			bp.HasFuncSelected = 0;
			$("."+bp.type).css('background','#999999');
			$("select[name="+bp.type+"_func]").val("o");
		}
		active_body_part = head;
		instructionsVisible = 1;
		$("#hello_greeting").css('display', 'block');
		$("#function_menu").css('display', 'none');
		$("#basic_info").css('display', 'none');
	}
	
	function back() {
		if (curState == REGISTER_STATE.FUNCTAG) {
			curState = REGISTER_STATE.START;
		} else if (curState == REGISTER_STATE.BASICINFO) {
			curState = REGISTER_STATE.FUNCTAG;
		} else if (curState == REGISTER_STATE.STORYINFO) {
			curState = REGISTER_STATE.BASICINFO;
		} else if (curState == REGISTER_STATE.CONNECTINFO) {
			curState = REGISTER_STATE.STORYINFO;
		}		
		changeToState(curState);
	}
	
	$("#backbox").click(function() {
		back();
	});
	
	$("#continuebox").click(function() {
		if (curState == REGISTER_STATE.START) {
			curState = REGISTER_STATE.FUNCTAG;	
		} else if (curState == REGISTER_STATE.FUNCTAG) {
			curState = REGISTER_STATE.BASICINFO;	
		} else if (curState == REGISTER_STATE.BASICINFO) {
			curState = REGISTER_STATE.STORYINFO;	
		} else if (curState == REGISTER_STATE.STORYINFO) {
			curState = REGISTER_STATE.CONNECTINFO;			
		}
		changeToState(curState);
	});	
		
	$("#submitbox").click(function() {
		if (curState == REGISTER_STATE.BASICINFO) {
			curState = REGISTER_STATE.FINISHED;
			changeToState(curState);
			submitRegistration();
			alert("You're done!");
		}
	});	
	
	$(".bodypart").click(function() {
		if (curState == REGISTER_STATE.START) {
			$("#hello_greeting").css('display', 'none');
			$("#function_menu").css('display', 'block');
			$("#backbox").css('display', 'block');
			$("#continuebox").css('display', 'block');
			curState = REGISTER_STATE.FUNCTAG;			
		}
	
		if (curState == REGISTER_STATE.FUNCTAG) {
			var last_active_bp = active_body_part;
			if (!last_active_bp.HasFuncSelected) {
				$("."+last_active_bp.type).css('background','#aaaaaa');
			}
			
			var cur_bp = bodyparts[$(this).attr("title")];
			if (!cur_bp.HasFuncSelected) {
				$("."+cur_bp.type).css('background', '#898989');
			}	
			
			$("#cur_bp").text(cur_bp.type); //.toUpperCase()
			active_body_part = cur_bp;
		}
	});
	
	
	$(".bodypart").hover(function() {
		if (curState == REGISTER_STATE.START || curState == REGISTER_STATE.FUNCTAG) {
			var bp = bodyparts[$(this).attr("title")];
			if (!bp.HasFuncSelected) {
				$("."+bp.type).css('background', '#898989');
			}
		}
	});

	$(".bodypart").mouseout(function() {
		if (curState == REGISTER_STATE.START || curState == REGISTER_STATE.FUNCTAG) {
			var bp = bodyparts[$(this).attr("title")];
			if ( (bp != active_body_part) && (!bp.HasFuncSelected) ) {
				$("."+bp.type).css('background', '#aaaaaa');
			}
		}
	});

	$(".full_func").click(function() {
		active_body_part.HasFuncSelected = 1;
		$("."+active_body_part.type).css('background', '#659c46');
		$("select[name="+active_body_part.type+"_func]").val("2");
	});

	$(".partial_func").click(function() {
		active_body_part.HasFuncSelected = 1;
		$("."+active_body_part.type).css('background', '#fdc643');
		$("select[name="+active_body_part.type+"_func]").val("1");
	});
	
	$(".no_func").click(function() {
		active_body_part.HasFuncSelected = 1;
		$("."+active_body_part.type).css('background', '#da4f1e');
		$("select[name="+active_body_part.type+"_func]").val("0");
	});
	
});