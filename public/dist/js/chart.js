function draw_chart(id, data, label, color, showlist, tooltip) {
    var sl=showlist;
    var data = data;
    var dataset = [{ label: label, data: data, color: color }];

    var options = {
        series: {
            bars: {
                show: true
            }
        },
        bars: {
            align: "center",
            barWidth: 0.5
        },
        xaxis: {
            mode: "categories",
            axisLabel: "World Cities",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10,
            labelWidth: 3,
        },
        yaxis: {
            axisLabel: "Average Temperature",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 3,
        },
        grid: {
            hoverable: true,
            borderWidth: 2,
            backgroundColor: { colors: ["#ffffff", "#EDF5FF"] }
        }
    };

    $(document).ready(function () {
        $.plot($("#" + id), dataset, options);
        $("#" + id).UseTooltip(tooltip);
    });

    function gd(year, month, day) {
        return new Date(year, month, day).getTime();
    }

    var previousPoint = null, previousLabel = null;

    $.fn.UseTooltip = function (tooltip) {
        $(this).bind("plothover", function (event, pos, item) {
            if (item) {
                if ((previousLabel != item.series.label) || (previousPoint != item.dataIndex)) {
                    previousPoint = item.dataIndex;
                    previousLabel = item.series.label;
                    $("#tooltip" + tooltip).remove();

                    var x = item.datapoint[0];
                    var y = item.datapoint[1];

                    var color = item.series.color;

                    showTooltip(item.pageX,
                        item.pageY,
                        color,
                        "<strong>" + item.series.label + "</strong><br>" + sl[x] + " : <strong>" + y + "</strong>", tooltip);
                }
            } else {
                $("#tooltip" + tooltip).remove();
                previousPoint = null;
            }
        });
    };

    function showTooltip(x, y, color, contents, tooltip) {
        $('<div id="tooltip' + tooltip + '">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y - 40,
            left: x - 120,
            border: '2px solid ' + color,
            padding: '3px',
            'font-size': '9px',
            'border-radius': '5px',
            'background-color': '#fff',
            'font-family': 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }
}


