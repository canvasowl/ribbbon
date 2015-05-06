//var current_url = window.location.pathname;
//var userId;
//var incompleteCount;
//var completeCount;
//
//if (current_url == "/hud" || current_url == "/") {
//
//		/**** AUTH ID */
//		function getAuthId(){
//			return $.ajax({
//				    url:  '/api/0000000000/authId',
//				    type: 'GET',
//				    dataType: 'json',
//				});
//		}
//
//		// Handle the getAuthId data
//		function handleAuthIdData(data /* , textStatus, jqXHR */ ) {
//		    userId = data;
//		}
//
//		// Handle the incompleteCount
//		function handleIncompleteCount(data /* , textStatus, jqXHR */ ) {
//		    incompleteCount = data.length;
//		}
//
//		// Handle the completedCount
//		function handleCompleteCount(data /* , textStatus, jqXHR */ ) {
//		    completeCount = data.length;
//		}
//
//		getAuthId().done(handleAuthIdData).done(function(){
//
//			/**** Incomplete Count */
//			function getIncompleteCount(){
//				return $.ajax({
//					    url:  '/api/0000000000/'+ userId +'/tasks/incomplete',
//					    type: 'GET',
//					    dataType: 'json',
//					});
//			}
//
//			getIncompleteCount().done(handleIncompleteCount).done(function(){
//
//					/**** Complete Count */
//					function getCompleteCount(){
//						return $.ajax({
//							    url:  '/api/0000000000/'+ userId +'/tasks/complete',
//							    type: 'GET',
//							    dataType: 'json',
//							});
//					}
//
//					getCompleteCount().done(handleCompleteCount).done(function(){
//
//						// Now that we have completed counts and
//						// incomplete count numbers
//						// lets create the doughnut chart.
//
//						// Set the informatio for the graph
//						var doughnutData = [
//								{
//									value: incompleteCount,
//									color:"#B75DB6",
//									highlight: "#944B94",
//									label: "Incomplete Tasks"
//								},
//								{
//									value: completeCount,
//									color: "#40F4C4",
//									highlight: "#18FFC6",
//									label: "Completed Tasks"
//								}
//							];
//
//							// Create the graph
//							var ctx = document.getElementById("chart-area").getContext("2d");
//							window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
//					});
//			})
//		});
//
//};
//
