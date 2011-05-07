
if ( !Array.prototype.reduce ) {

    Array.prototype.reduce = function( fun /*, initial*/ ) {

        var len = this.length;
        var i = 0;

        if ( arguments.length >= 2 )
            var rv = arguments[1];

        else {
            do {
                if ( i in this ) {
                    rv = this[i++];
                    break;
                }
            }
            while (true);
        }

        for ( ; i < len; i++ ) {
            if ( i in this ) {
                rv = fun.call( null, rv, this[i], i, this );
            }
        }

        return rv;

    };

}

if ( google && google.load ) {

    /**
     * Reduces pings to an array of objects containing { date, count } info
     * about the number of pings received on a certain day.
     *
     */
    var countDayPings = function( acc, el ) {

        var dateParts = el.dateUpdated.match( /^(\d+)-(\d+)-(\d+).*$/ );
        var dateString = dateParts[3]+ '/' +dateParts[2]+ '/' +dateParts[1];
        var updatedAcc = false;

        $( acc ).each(function( index, item ) {

            if ( item.date == dateString ) {
                acc[ index ].count++;
                updatedAcc = true;
                return false;
            }

        });

        if ( !updatedAcc ) {
            acc = acc.concat([{
                  date: dateString,
                  count: 1
            }]);
        }

        return acc;

    };

    /**
     * Maps pings on day data to google area chart format
     * 
     */
    var pingsToChartData = function( el ) {

        var max = 96;
        var percentage = (el.count / max) * 100;

        if ( percentage > 100 ) {
            percentage = 100;
        }

        return [ el.date, percentage ];

    };

    /**
     * Renders a chart about server availability
     * 
     */
    var renderChart = function( json ) {

        var data = new google.visualization.DataTable();
        var chart = new google.visualization.AreaChart(document.getElementById('serverChart'));

        data.addColumn( 'string', 'Date' );
        data.addColumn( 'number', '%' );

        var chartData = json.reduce( countDayPings, [] )
                            .map( pingsToChartData );

        data.addRows( chartData );

        chart.draw( data, {
            width: 570,
            height: 400,
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: '% Availability'
            }
        });

    };

    google.load( 'jquery', '1.5.1' );
    google.load( 'visualization', '1', {'packages':['corechart']} );
    google.setOnLoadCallback(function() {

        $( '#serverChart' ).each(function() {
            var serverId = $( this ).data( 'id' );
            $.getJSON(
                'index.php?controller=community&action=info&id=' +serverId+ '&format=json',
                {},
                renderChart
            );
        });

    });

}
