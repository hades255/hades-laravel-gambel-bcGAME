$.on("/fairness", function () {
    let e = "dice";
    (window.hash = function () {
        $.get("/provably_fair/" + $("#_server").val() + "/" + $("#_client").val(), function (a) {
            let t = JSON.parse(a);
            "coinflip" === e || "hilo" === e || "keno" === e || "mines" === e || "blackjack" === e
                ? ($("#number").fadeOut("fast"), $("#number_sub").fadeOut("fast"), $("#f").fadeOut("fast"), $("#f_sub").fadeOut("fast"), $("#r_sub").fadeIn("fast"), $("#res").fadeIn("fast"))
                : ($("#number").fadeIn("fast"), $("#number_sub").fadeIn("fast"), $("#f").fadeIn("fast"), $("#f_sub").fadeIn("fast"), $("#r_sub").fadeOut(0), $("#res").fadeOut(0)),
                $("#number").html(t.result),
                $("#hash").html(""),
                $("#f").html("");
            let s = chunk(t.hash, 2);
            for (let e = 0; e < s.length; e++) $("#hash").append("<span style='color: " + (e < 8 ? "white" : "gray") + "'>" + s[e] + "</span> ");
            if (($("#hash").append("<br>"), "dice" === e))
                $("#f").html(t.result + ' <i class="fal fa-percent tooltip" title="mod"></i> 100 = ' + (parseInt(t.result) % 100)), $("#number").append(' <i class="fal fa-arrow-right"></i> ' + (parseInt(t.result) % 100));
            else if ("roulette" === e) $("#f").html(t.result + ' <i class="fal fa-percent tooltip" title="mod"></i> 37 = ' + (parseInt(t.result) % 37));
            else if ("crash" === e) {
                let e = parseInt(t.result) / 100,
                    a = e + ' <i class="fal fa-arrow-right"></i> ';
                0 === e && (e = a + "1.00 (минимальное значение)"),
                    e >= 20 && (e = a + "20.00 (максимальное значение)"),
                    $("#f").html(t.result + ' <i class="fal fa-divide"></i> 100 = ' + e),
                    $("#number").append(' <i class="fal fa-arrow-right"></i> ' + e);
            } else if ("wheel" === e) {
                let e = ["Зеленый", "Красный", "Черный", "Красный", "Черный", "Красный", "Черный", "Красный", "Черный", "Красный", "Черный", "Красный", "Черный", "Красный", "Черный"],
                    a = parseInt(t.result) % e.length;
                (a = a + " (" + e[a] + ")"), $("#f").html(t.result + ' <i class="fal fa-percent" title="mod"></i> ' + e.length + " = " + a), $("#number").html(t.result + ' <i class="fal fa-arrow-right"></i> ' + a);
            } else if ("keno" === e) {
                $("#res").append("<br>");
                let e = t.resultbase.replace(/^\[(.+)\]$/, "$1");
                $("#res").html(e.replace(/(\d+,)/g, "$1 "));
            } else if ("mines" === e) {
                $("#res").append("<br>");
                let e = t.resultbasen1.replace(/^\[(.+)\]$/, "$1");
                $("#res").html(e.replace(/(\d+,)/g, "$1 "));
            }
        });
    }),
        hash(),
        $(".fn_game").click(function () {
            $(".fn_game").removeClass("fn_game_selected"), $(this).addClass("fn_game_selected"), (e = $(this).attr("data-game")), hash();
        });
});
