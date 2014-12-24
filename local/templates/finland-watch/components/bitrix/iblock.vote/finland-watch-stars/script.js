;(function(window) {
	if (window.JCIblockVoteStars)
		return;

	JCIblockVoteStars = function (params)
	{
		this.progressId = params.progressId;
		this.ratingId = params.ratingId;
		this.starsId = params.starsId;
		this.ajaxUrl = params.ajaxUrl;
		this.voteId = params.voteId;
		this.starsObj = null;
		this.votedValue = null;
		this.preVotedValue = null;
	};

	JCIblockVoteStars.prototype.setValue = function(value)
	{
		value = parseInt(value);
		if (isNaN(value))
			value = 0;
		else if(value > 100)
			value = 100;
		else if(value < 0)
			value = 0;

		var progressObj = document.getElementsByClassName(this.progressId);

		if(progressObj.length>0)
		{
			for( var i = 0; i < progressObj.length; i++) {
				progressObj[i].style.width = parseInt(value) + "%";
			}
			this.votedValue = value;
		}
	};

	JCIblockVoteStars.prototype.setVotes = function(value)
	{
		var ratingObj = document.getElementsByClassName(this.ratingId);

		if(ratingObj.length>0)
			for( var i = 0; i < ratingObj.length; i++)
				ratingObj[i].innerHTML = "( "+value+" )";
	};

	JCIblockVoteStars.prototype.getStarsObj = function()
	{
		if(!this.starsObj)
			this.starsObj = document.getElementsByClassName(this.starsId);

		return this.starsObj;
	};

	//todo: IE 8 has no pageX, pageY.
	JCIblockVoteStars.prototype.onMouseMove = function(event)
	{
		var starsObj=this.getStarsObj();
		var starsPos = BX.pos(starsObj[0]);
		var voteValue = (event.pageX - starsPos.left)/starsPos.width*5;

		for (var i = 1; i <= 5; i++)
		{
			if(voteValue < i)
			{
				voteValue = i;
				break;
			}
		}
		this.setValue(voteValue*20);
	};

	JCIblockVoteStars.prototype.onMouseOver = function(event)
	{
		var starsObj=this.getStarsObj();
		for(var i=0; i<starsObj.length; i++) {
			BX.bind(starsObj[i], 'click', BX.proxy(this.onVote, this));
		}
		this.preVotedValue = this.votedValue;
	};

	JCIblockVoteStars.prototype.onMouseOut = function(event)
	{
		var starsObj=this.getStarsObj();
		for(var i=0; i<starsObj.length; i++) {
			BX.unbind(starsObj[i], 'click', BX.proxy(this.onVote, this));
			this.votedValue = this.preVotedValue;
			this.setValue(this.votedValue);
		}
	};

	JCIblockVoteStars.prototype.onVote = function(event)
	{
		this.unBindEvents();

		this.ajaxParams.rating = parseInt(this.votedValue/20)-1;
		this.ajaxParams.vote = "Y";
		this.ajaxParams.vote_id = this.voteId;

		BX.ajax({
			timeout:   30,
			method:   'POST',
			dataType: 'json',
			url:       this.ajaxUrl,
			data:      this.ajaxParams,
			onsuccess: BX.delegate(this.SetResult, this)
		});
	};

	JCIblockVoteStars.prototype.SetResult = function(result)
	{
		if (!!result && !result.ERROR)
		{
			this.setValue((result.value+1)*20);
			this.setVotes(result.votes);
		}
	};

	JCIblockVoteStars.prototype.bindEvents = function()
	{
		var starsObj = this.getStarsObj();
		for(var i=0; i<starsObj.length; i++){
			BX.bind(starsObj[i], 'mousemove', BX.proxy(this.onMouseMove, this));
			BX.bind(starsObj[i], 'mouseover', BX.proxy(this.onMouseOver, this));
			BX.bind(starsObj[i], 'mouseout', BX.proxy(this.onMouseOut, this));
		}

	};

	JCIblockVoteStars.prototype.unBindEvents = function()
	{
		var starsObj = this.getStarsObj();
		for(var i=0; i<starsObj.length; i++) {
			BX.unbind(starsObj[i], 'mousemove', BX.proxy(this.onMouseMove, this));
			BX.unbind(starsObj[i], 'mouseover', BX.proxy(this.onMouseOver, this));
			BX.unbind(starsObj[i], 'mouseout', BX.proxy(this.onMouseOut, this));
			BX.unbind(starsObj[i], 'click', BX.proxy(this.onVote, this));
		}
	};
})(window);