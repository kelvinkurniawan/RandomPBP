var url = window.location.origin + "/";
var limit = 10;
var offset = 900;
var top = 0;
var openModal = false;

function openStoryModal() {
	openModal = !openModal;
}

function openStoryModalWithAttachment() {
	openModal = false;
	$(".fade-background").removeClass("show");
	$("#postBox").removeClass("show");
}

function closeStoryModal() {
	openModal = false;
	$(".fade-background").removeClass("show");
	$("#postBox").removeClass("show");
}

function like_post(postId) {
	$.ajax({
		url: url + "home/performLikePost/" + postId,
		method: "GET",
		success: function (data) {
			show_status(limit);
		},
	});
}

function openSearch() {
	$(".search-box").toggleClass("show");
}

function search(key) {
	$.ajax({
		url: url + "home/searchQuery?q=" + key,
		method: "GET",
		dataType: "JSON",
		success: function (data) {
			var resUser = "<h6 class='text-muted'>Users</h6>";
			var resHashtag = "<h6 class='text-muted'>Hashtag</h6>";
			for (i = 0; i < data.user.length; i++) {
				resUser +=
					'<a href="' +
					url +
					"profile/" +
					data.user[i].username +
					'" class="search-result text-dark p-2 text-decoration-none"><i class="fas fa-poo mr-3"></i>' +
					data.user[i].name +
					"</a>";
			}
			for (i = 0; i < data.hashtag.length; i++) {
				resHashtag +=
					'<a href="#" class="search-result text-dark p-2 text-decoration-none"><i class="fab fa-slack-hash mr-3"></i>' +
					data.hashtag[i].hashtag +
					"</a>";
			}
			$(".result-user").html(resUser);
			$(".result-hashtag").html(resHashtag);
		},
	});
}

function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1),
		sURLVariables = sPageURL.split("&"),
		sParameterName,
		i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split("=");

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined
				? true
				: decodeURIComponent(sParameterName[1]);
		}
	}
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
	post = post.replace(/(^|\s)(#[a-z\d-]+)/gi, function (x) {
		return (
			" <a href='" +
			url +
			"home/hashtag/?q=" +
			x.split("#")[1] +
			"'>" +
			x +
			"</a>"
		);
	});

	return post;
}

function unlike_post(postId) {
	$.ajax({
		url: url + "home/performUnlikePost/" + postId,
		method: "GET",
		success: function (data) {
			show_status(limit);
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

function getByHashtag() {
	path = window.location.pathname.split("/");
	return path[4];
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
				html += '<div class="row p-3">';
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
			$("#likeModal").modal("show");
		},
	});
}

function show_status(limit = 10) {
	const queryString = window.location.search;
	const urlParams = new URLSearchParams(queryString);
	parent = 0;
	type = 0;
	hashtag = urlParams.get("q");
	if (hashtag == null) {
		type = 0;
	} else {
		type = 1;
	}
	if (getParentByPath() != "") {
		parent = getParentByPath();
	}
	$.ajax({
		url:
			url +
			"home/getStatus/" +
			parent +
			"/" +
			type +
			"?limit=" +
			limit +
			"&hashtag=" +
			hashtag,
		type: "GET",
		async: true,
		dataType: "json",
		success: function (data) {
			var html = "";
			var i;
			for (i = 0; i < data.length; i++) {
				const color = ["tags-green", "tags-cyan", "tags-pink", "tags-purple"];

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
					'" class="w-100 rounded-circle" />' +
					"</div>" +
					"</div>" +
					'<div class="col-10">' +
					'<div class="post-author d-flex justify-content-between">' +
					data[i].postAuthor +
					'<span class="small text-muted">' +
					data[i].postDate +
					"</span>" +
					"</div>" +
					'<div class="post-body pb-3">' +
					renderPost(data[i].postBody) +
					"</div>";
				if (data[i].haveAttachment == 1) {
					var ext = data[i].file.split(".")[1];
					if (ext == "png" || ext == "jpg" || ext == "gif") {
						html +=
							'<div class="post-attachment"><img src="' +
							url +
							"/uploads/" +
							data[i].file +
							'" width="80%" style="border-radius: 10px"></div>';
					} else {
						html +=
							'<video width="80%" style="border-radius: 10px" controls>' +
							'<source src="' +
							url +
							"/uploads/" +
							data[i].file +
							'" type="video/mp4">' +
							"Your browser does not support HTML video." +
							"</video>";
					}
				}
				html +=
					'<div class="post-control mt-3">' +
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
					var randomColor = Math.floor(Math.random() * color.length);
					html +=
						'<a href="' +
						url +
						"home/hashtag/?q=" +
						data[i].postMeta.postTags[j] +
						'" class="' +
						color[randomColor] +
						' px-3 py-1 m-1 text-white"> ' +
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

function loadNotification() {
	$.ajax({
		url: url + "home/loadNotification",
		method: "GET",
		async: true,
		dataType: "json",
		success: function (data) {
			console.log(data);
			html = "";
			for (i = 0; i < data.length; i++) {
				if (data[i].status == 1) {
					html +=
						'<a type="button" class="list-group-item list-group-item-action notif-read">';
				} else {
					html +=
						'<a type="button" class="list-group-item list-group-item-action notif-active">';
				}
				html += '<i class="far fa-comment mr-3"></i>';
				html += data[i].from + " " + data[i].message + " ";
				html += "<sub>" + moment(data[i].time).fromNow() + "</sub>";
				html += "</a>";
			}

			$(".notification-container").html(html);
		},
	});
}

$(document).ready(function () {
	search();
	show_status();
	loadNotification();
	Pusher.logToConsole = false;

	if (getUrlParameter("edit_profile") == "true") {
		$(".editProfile").modal("show");
	}

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

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			if (openModal == true) {
				$(".fade-background").addClass("show");
			}
		} else {
			if (openModal == true) {
				$(".fade-background").removeClass("show");
			}
		}
	});

	$(window).scroll(function () {
		$(".search-box").removeClass("show");
	});

	$(".input-body-mobile").on("keyup", function () {
		$(".input-body").val($(".input-body-mobile").val());
	});

	$("#search-q").on("keyup", function () {
		if ($(this).val() != "") {
			search($(this).val());
		}

		if ($(this).val() == "") {
			$(".result-user").html("<h6 class='text-muted'>Users</h6>");
			$(".result-hashtag").html("<h6 class='text-muted'>Hashtag</h6>");
		}
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
			data: {
				body: input_body,
				parent: parent,
				anonym: anonym,
				withAttachment: 0,
			},
			success: function () {
				show_status();
				$(".input-body").val("");
				$(".input-body-mobile").val("");
			},
		});
	});

	$(window).scroll(function () {
		var windowTop = $(window).scrollTop();
		if (windowTop > offset) {
			limit += 1;
			offset += 200;
			show_status(limit);
		}
		var doc = document.documentElement;
		top = (window.pageYOffset || doc.scrollTop) - (doc.clientTop || 0);
	});

	$(window).on("load", function () {
		var recommendedFriendHeight = $(".recommended-friend").height();
		//$('.recommended-friend').css('height', recommendedFriendHeight);
		$(".rf-container").css("height", $(window).height());
	});

	// Service Worker ~ PWA

	if ("serviceWorker" in navigator) {
		window.addEventListener("load", () => {
			navigator.serviceWorker
				.register("/serviceWorker.js", { scope: "/" })
				.then(() => {
					console.log("Service Worker Registered");
				});
		});
	}

	var deferredPrompt;

	window.addEventListener("beforeinstallprompt", function (e) {
		console.log("please install application");

		$(".alert-install").addClass("show");
		setTimeout(function () {
			$(".alert-install").removeClass("show");
		}, 5000);

		e.preventDefault();
		deferredPrompt = e;
	});

	$(".install-app").on("click", (e) => {
		deferredPrompt.prompt();
		deferredPrompt.userChoice.then((choiceResult) => {
			if (choiceResult.outcome === "accepted") {
				console.log("User accepted the A2HS prompt");
			} else {
				console.log("User dismissed the A2HS prompt");
			}
			deferredPrompt = null;
		});
	});
});
