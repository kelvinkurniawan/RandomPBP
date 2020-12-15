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
				shares: ["email", "twitter", "googleplus", "whatsapp"],
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
