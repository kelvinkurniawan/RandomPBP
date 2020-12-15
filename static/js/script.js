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
					'<a href="' +
					url +
					"home/hashtag/?q=" +
					data.hashtag[i].hashtag +
					'" class="search-result text-dark p-2 text-decoration-none"><i class="fab fa-slack-hash mr-3"></i>' +
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

function openSelectPhotoModal() {
	$(".editProfile").modal("hide");
}

$(document).ready(function () {
	search();
	show_status();
	loadNotification();

	var currentPath = window.location.pathname;

	if (currentPath.split("/")[2] == "read") {
		$(".create-story").html("Add Reply");
	}

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
			loadNotification();
		}
	});
	// Event

	$(window).scroll(function () {
		if ($(this).scrollTop() > 100) {
			if (openModal == true) {
				$(".fade-background").addClass("show");
				$(".fade-background").css('z-index', 9999999);
				$("#postBox").css('z-index',99999999);
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
