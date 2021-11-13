var iterationcard = 1;
var iterationCol = 1;
$('body').append(htmlcard);
var htmlcard = "<div class='row'>";
while (iterationCol <= columns) {
    htmlcard += '<div class="columna">';
    while (iterationcard <= channelcount) {
        if (iterationcard == 1) {
            htmlcard += '<div class="channel_' + iterationcard + ' card activee"><img src="' + imgUrl + '" class="channelImage"><div class="card-content"><div class="channelName">' + chanName + '</div><div class="odometer subscriberCount">0</div></div></div>';
        } else {
            htmlcard += '<div class="channel_' + iterationcard + ' card"><img src="' + imgUrl + '" class="channelImage"><div class="card-content"><div class="channelName">' + chanName + '</div><div class="odometer subscriberCount">0</div></div></div>';
        }
        iterationcard++;
        if ((iterationcard - 1) % columns == 0) {
            break;
        }
    }
    htmlcard += '</div>';
    iterationCol++;
}
htmlcard += '</div>'; // close row
$('body').append(htmlcard);

function actualiza_suscribers() {
    var googleApiCallURL = "";
    var channelList = [];

    $.getJSON('canales.json', function(channels) {
        channelList = channels.reverse();
        googleApiCallURL = "https://www.googleapis.com/youtube/v3/channels?part=snippet%2Cstatistics&id=" + channelList + "&key=" + APIKeys[0];

        $.getJSON(googleApiCallURL, function(result) {
            var iteration = 0;
            var items = [];
            while (iteration <= Math.min(channelcount - 1, result.items.length - 1)) {
                if (result.items[iteration].snippet.title)
                    items.push({
                        iteration: iteration,
                        name: result.items[iteration].snippet.title,
                        value: result.items[iteration].statistics.subscriberCount,
                        image: result.items[iteration].snippet.thumbnails.medium.url
                    });
                iteration++;
            }
            console.log("items 1 --------" + JSON.stringify(items));
            items.sort(function(a, b) { return b.value - a.value; });
            console.log("items 2 --------" + JSON.stringify(items));
            iteration = 0;
            while (iteration <= Math.min(channelcount - 1, result.items.length - 1)) {
                $(".channel_" + iteration + " .channelName").html('' + items[iteration].name);
                $('.channel_' + iteration + ' .subscriberCount').html(items[iteration].value);
                $('.channel_' + iteration + ' .channelImage').attr('src', items[iteration].image);
                iteration++;
            }
        });
    });
}


actualiza_suscribers();
setInterval(actualiza_suscribers, timeRefresh * 1000);