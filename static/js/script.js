var url = window.location.origin + "/random3/";

function like_post(postId) {
	$.ajax({
		url: url + "home/performLikePost/" + postId,
		method: "GET",
		success: function (data) {
			show_status();
		},
	});
}

function follow(followId) {
	$.ajax({
		url: url + "home/performFollow/" + followId,
		method: "GET",
		success: function (data) {
			show_status();
			$("#user-" + followId + "-follow").hide();
			$("#user-" + followId + "-unfollow").show();
		},
	});
}

function unfollow(followId) {
	$.ajax({
		url: url + "home/performUnfollow/" + followId,
		method: "GET",
		success: function (data) {
			show_status();
			$("#user-" + followId + "-follow").show();
			$("#user-" + followId + "-unfollow").hide();
		},
	});
}

function renderPost(post, userId) {
	post = post.replace(
		/(^|\s)(@[a-z\d-]+)/gi,
		"$1<a href='" + url + "profile/$2'>$2</a>"
	);
	post = post.replace(
		/(^|\s)(#[a-z\d-]+)/gi,
		"$1<a href='" + url + "hashtag/$2'>$2</a>"
	);

	return post;
}

function unlike_post(postId) {
	$.ajax({
		url: url + "home/performUnlikePost/" + postId,
		method: "GET",
		success: function (data) {
			show_status();
		},
	});
}

function getParentByPath() {
	path = window.location.pathname.split("/");
	totalPath = path.length;
	if (path[totalPath - 1] == "") {
		return path[totalPath - 2];
	} else {
		return path[totalPath - 1];
	}
}

function sharePost(id) {
	$(".share-container.post-" + id + " .share-box").toggleClass("show");
}
function getPostLikes(postId) {
	$.ajax({
		url: url + "home/getPostLikeById/" + postId,
		method: "GET",
		async: true,
		dataType: "json",
		success: function (data) {
			var html = "";

			for (var i = 0; i < data.length; i++) {
				html += '<div class="row">';
				html += '<div class="col-2">';
				html +=
					'<img class="rounded-circle" src="' +
					data[i].photo +
					'" width="100%">';
				html += "</div>";
				html +=
					'<div class="font-weight-bold d-flex justify-content-center align-items-center">' +
					data[i].name +
					"</div>";
				html += "</div>";
			}
			$(".likepost").html(html);
			$("#likeModal").modal("toggle");

			console.log(data);
		},
	});
}

function show_status(limit = 10) {
	parent = 0;
	if (getParentByPath != "") {
		parent = getParentByPath();
	}
	$.ajax({
		url: url + "home/getStatus/" + parent + "?limit=" + limit,
		type: "GET",
		async: true,
		dataType: "json",
		success: function (data) {
			var html = "";
			var i;
			for (i = 0; i < data.length; i++) {
				html +=
					'<div class="card widget bg-randomize-3 center mt-4" style="width: 100%">' +
					'<div class="card-body">' +
					'<div class="post">' +
					'<div class="post-single">' +
					'<div class="row">';

				if (data[i].postParent != 0 && getParentByPath() == "home") {
					html +=
						'<div class="col-md-12 mb-3">' +
						'<div class="post-info text-sm d-flex align-items-center">' +
						'<div style="width:24px">' +
						'<i class="gg-corner-up-left mr-3"></i>' +
						"</div>" +
						'Replied to <a href="#" class="ml-1">' +
						data[i].postAuthorParent +
						"</a>" +
						"</div>" +
						"</div>";
				}

				html +=
					'<div class="col">' +
					'<div class="photo-profile mb-3">' +
					'<img src="' +
					data[i].authorPhoto +
					'" class="w-100" />' +
					"</div>" +
					"</div>" +
					'<div class="col-9">' +
					'<div class="post-author">' +
					data[i].postAuthor +
					"</div>" +
					'<div class="post-body">' +
					renderPost(data[i].postBody) +
					"</div>" +
					'<div class="post-control">' +
					'<div class="d-flex justify-content-between">';

				if (data[i].postMeta.isLiked) {
					html +=
						'<div class="d-flex justify-content-center align-items-center"><a href="javascript:void(0)" onclick="unlike_post(' +
						data[i].postId +
						')" class="text-success"><i class="gg-heart" style="margin-right: 10px"></i>' +
						data[i].postMeta.postLikes +
						"</a><a class='d-none d-sm-none d-md-block ml-1' href='javascript:void(0)' onclick='getPostLikes(" +
						data[i].postId +
						")'> Likes</a></div>";
				} else {
					html +=
						'<div class="d-flex justify-content-center align-items-center"><a href="javascript:void(0)" onclick="like_post(' +
						data[i].postId +
						')" ><i class="gg-heart" style="margin-right: 10px"></i>' +
						data[i].postMeta.postLikes +
						"</a><a class='d-none d-sm-none d-md-block ml-1' href='javascript:void(0)' onclick='getPostLikes(" +
						data[i].postId +
						")'> Likes</a></div>";
				}

				html +=
					'<a href="' +
					url +
					"home/read/" +
					data[i].postId +
					'"><i class="gg-comment" style="margin-right: 10px"></i> ' +
					data[i].postMeta.postReplies +
					" <div class='d-none d-sm-none d-md-block ml-1'> Replies</div></a>";
				html +=
					'<a href="javascript:void(0)" onclick="sharePost(' +
					data[i].postId +
					')"><i class="gg-share" style="margin-right: 15px"></i><div class="d-none d-sm-none d-md-block ml-1"> Shares</div></a>';
				html += "</div></div>";

				if (data[i].postMeta.postReplies > 0 && getParentByPath() == "home") {
					html +=
						'<div class="show-all mt-3">' +
						'<a href="#">>> Show all replies <<</a>' +
						"</div>";
				}
				html += '<div class="tags mt-3">';
				for (let j = 0; j < data[i].postMeta.postTags.length; j++) {
					html +=
						'<a href="#" class="bg-primary px-3 py-1 text-white"> ' +
						data[i].postMeta.postTags[j] +
						"</a>";
				}
				html += "</div>" + "</div>" + "</div>" + "</div>" + "</div>" + "</div>";
				html +=
					"<div class='share-container post-" +
					data[i].postId +
					"'><div class='share-box hide p-2'></div></div>";
				html += "</div>";
			}
			$(".main-content-post").html(html);

			$(".share-box").jsSocials({
				showLabel: false,
				showCount: "inside",
				shares: [
					"email",
					"twitter",
					"facebook",
					"googleplus",
					"linkedin",
					"pinterest",
					"stumbleupon",
					"whatsapp",
				],
			});
		},
	});
}

$(document).ready(function () {
	show_status();
	Pusher.logToConsole = false;

	var pusher = new Pusher("d9a7263363532f7ffbb5", {
		cluster: "ap1",
		forceTLS: true,
	});

	var channel = pusher.subscribe("status");

	channel.bind("insert", function (data) {
		if (data.message === "success") {
			show_status();
		}
	});
	// Event

	$(".input-body-mobile").on("keyup", function () {
		$(".input-body").val($(".input-body-mobile").val());
	});

	$(".btn-submit-post").on("click", function () {
		var input_body = $(".input-body").val();
		var parent = $(".input-parent").val();
		var anonym = 0;
		if ($(".input-anonym:checked").length > 0) {
			anonym = 1;
		} else {
			anonym = 0;
		}
		$.ajax({
			url: url + "home/performAddPost",
			method: "POST",
			data: { body: input_body, parent: parent, anonym: anonym },
			success: function () {
				show_status();
				$(".input-body").val("");
				$(".input-body-mobile").val("");
			},
		});
	});

	var stickyTop = $(".main-content-post").offset().top;

	var limit = 10;
	var offset = 900;

	$(window).scroll(function () {
		var windowTop = $(window).scrollTop();
		if (windowTop > offset) {
			limit += 1;
			offset += 200;
			show_status(limit);
		}
	});
});
