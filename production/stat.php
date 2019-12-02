<?php 
	include('dbh.inc.php');
	include('head.php');
    include('menu_dashboard.php');
    include('header.php');
	try {
    $stmt = $conn->prepare("SELECT count(*) FROM clients"); 
	$stmt2 = $conn->prepare("SELECT SUM(total) FROM facture"); 
	$stmt3 = $conn->prepare("SELECT * FROM reference"); 
	$stmt3->execute();
	$stmt2->execute();
	$stmt1 = $conn->prepare("SELECT count(*) FROM reservation"); 
	$stmt1->execute(); 						
    $stmt->execute(); 
    // set the resulting array to associative
    $clts = $stmt->fetchColumn();
	$ca = $stmt2->fetchColumn();
	$reser = $stmt1->fetchColumn();	
	$refs = $stmt3->fetchAll(PDO::FETCH_BOTH);	
}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

    <!-- page content -->
    <div class="right_col" role="main">
                <div class="row">
                  <div class="col-lg-8">
                      <!--Bar graph-->
                        <div class="row">
                          <!-- bar chart -->
                          <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                              <div class="x_panel">
                                  <div class="x_title">
                                      <h2>Nombre de projets enregistrés par année</h2>
                                      <ul class="nav navbar-right panel_toolbox">
                                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                          </li>
                                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                                          </li>
                                      </ul>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                      <canvas id="mybarChart"></canvas>
                                  </div>
                              </div>
                          </div>

                          <div class="clearfix"></div>
                        </div>

                  </div>

                  <div class="col-lg-4">
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="tile-stats">
                              <div class="icon"><i class="fa fa-check-square"></i></div>
							 
                              <div class="count"><?php echo $reser; ?></div>
							  
                              <h3>Toutes les réservations</h3>

                          </div>
                      </div>
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="tile-stats">
                              <div class="icon"><i class="fa fa-user"></i></div>
                              <div class="count"><?php echo $clts; ?></div>
                              <h3>Nombre de clients</h3>

                          </div>
                      </div>
                      <div class="animated flipInY col-lg-12 col-md-12 col-sm-12 col-xs-12">
                          <div class="tile-stats">
                              <div class="icon"><i class="fa fa-money"></i></div>
							  
                              <div class="count"><?php echo $ca; ?></div>
                              <h3>Chiffre d'affaire</h3>

                          </div>
                      </div>
                  </div>
                </div>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nombre de projet par état</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div id="echart_pie" style="height:350px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Nombre de projet</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <canvas id="bar-chart" width="800" height="450"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>





<?php 
    include('footer.php');
    include('script.php');
	
?> 
<!-- ECharts -->
    <script src="vendor/echarts/dist/echarts.min.js"></script>
    <script src="vendor/Chart.js/dist/Chart.min.js"></script>
<!--morris.js-->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morris.js/morris.min.js"></script>


    <script>
      var theme = {
          color: [
              '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },

          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };

     </script>

    <script>
        // Bar chart
        var ctx = document.getElementById("mybarChart");
        var mybarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php foreach ($refs as $ref){
						echo ref['nom'];
						}?>
                ]
                ,
                datasets: [{
                    label: 'nombre de projets',
                    backgroundColor: "#26B99A",
                    data: [<?php foreach ($refs as $ref){
						echo ref;
						}?>
						]
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

    </script>

    <script>
        var echartPie = echarts.init(document.getElementById('echart_pie'), theme);

        echartPie.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ['En cours', 'Achevé']
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie', 'funnel'],
                        option: {
                            funnel: {
                                x: '25%',
                                width: '50%',
                                funnelAlign: 'left',
                                max: 1548
                            }
                        }
                    },
                    restore: {
                        show: true,
                        title: "Actualiser"
                    },
                    saveAsImage: {
                        show: true,
                        title: "Enregistrer"
                    }
                }
            },
            calculable: true,
            series: [{
                //name: '访问来源',
                type: 'pie',
                radius: '55%',
                center: ['50%', '50%'],
                data: [{
                    value: {{ enCours }},
                    name: 'En cours'
                }, {
                    value: {{ abouti }},
                    name: 'Achevé'
                }]
            }]
        });

        var dataStyle = {
            normal: {
                label: {
                    show: false
                },
                labelLine: {
                    show: false
                }
            }
        };

        var placeHolderStyle = {
            normal: {
                color: 'rgba(0,0,0,0)',
                label: {
                    show: false
                },
                labelLine: {
                    show: false
                }
            },
            emphasis: {
                color: 'rgba(0,0,0,0)'
            }
        };
    </script>

    <!--echart pie 2-->
    <script>
        var echartPie2 = echarts.init(document.getElementById('echart_pie2'), theme);

        echartPie2.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ['Direct Access', 'E-mail Marketing', 'Union Ad', 'Video Ads', 'Search Engine']
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie', 'funnel'],
                        option: {
                            funnel: {
                                x: '25%',
                                width: '50%',
                                funnelAlign: 'left',
                                max: 1548
                            }
                        }
                    },
                    restore: {
                        show: true,
                        title: "Actualiser"
                    },
                    saveAsImage: {
                        show: true,
                        title: "Enregistrer"
                    }
                }
            },
            calculable: true,
            series: [{
                name: '访问来源',
                type: 'pie',
                radius: '55%',
                center: ['50%', '48%'],
                data: [{
                    value: 335,
                    name: 'Direct Access'
                }, {
                    value: 310,
                    name: 'E-mail Marketing'
                }, {
                    value: 234,
                    name: 'Union Ad'
                }, {
                    value: 135,
                    name: 'Video Ads'
                }, {
                    value: 1548,
                    name: 'Search Engine'
                }]
            }]
        });

        var dataStyle = {
            normal: {
                label: {
                    show: false
                },
                labelLine: {
                    show: false
                }
            }
        };

        var placeHolderStyle = {
            normal: {
                color: 'rgba(0,0,0,0)',
                label: {
                    show: false
                },
                labelLine: {
                    show: false
                }
            },
            emphasis: {
                color: 'rgba(0,0,0,0)'
            }
        };
        </script>
        <!--echart pie 3-->
        <script>
        var echartPie3 = echarts.init(document.getElementById('echart_pie3'), theme);

        echartPie3.setOption({
            tooltip: {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },
            legend: {
                x: 'center',
                y: 'bottom',
                data: ['Nationaux', 'Bilatéraux', 'Multilatéraux']
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        type: ['pie', 'funnel'],
                        option: {
                            funnel: {
                                x: '25%',
                                width: '50%',
                                funnelAlign: 'left',
                                max: 1548
                            }
                        }
                    },
                    restore: {
                        show: true,
                        title: "Actualiser"
                    },
                    saveAsImage: {
                        show: true,
                        title: "Enregistrer"
                    }
                }
            },
            calculable: true,
            series: [{
                //name: '访问来源',
                type: 'pie',
                radius: '55%',
                center: ['50%', '48%'],
                data: [{
                    value: {{ nb_natio }},
                    name: 'Nationaux'
                }, {
                    value: {{ nb_bi }},
                    name: 'Bilatéraux'
                }, {
                    value: {{ nb_multi }},
                    name: 'Multilatéraux'
                }]
            }]
        });

        var dataStyle = {
            normal: {
                label: {
                    show: false
                },
                labelLine: {
                    show: false
                }
            }
        };

        var placeHolderStyle = {
            normal: {
                color: 'rgba(0,0,0,0)',
                label: {
                    show: false
                },
                labelLine: {
                    show: false
                }
            },
            emphasis: {
                color: 'rgba(0,0,0,0)'
            }
        };

    </script>
<script>
// Bar chart
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
{% endblock %}