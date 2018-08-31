            
            
            </div><!-- Main center column -->
            <div class="col-md-3 col-sm-1 col-xs-0">
            </div>
        </div><!-- Row end -->

        <div class="row">
            <footer class="text-center col-xs-12" id="footer">
                <p>Copyright Goblineer © 2017 - <?php echo date("Y"); ?>. All Rights Reserved.
                World of Warcraft © is a registered trademark of Blizzard Entertainment, Inc.
                Goblineer is not associated with or endorsed by Blizzard Entertainment, Inc.</p>
                <p>This is a fork of <a href="https://github.com/Petrosz007/goblineer">https://github.com/Petrosz007/goblineer</a></p>
            </footer>
        </div>

        
        <div id="offline-notification" style="display: none;">
                    <div style="padding: 5px;">
                        <div id="inner-message" class="alert alert-danger" role="alert">
                            
                            You appear to be offline right now. Data will not be updated until you go online and refresh the page.
                        </div>
                    </div>
                </div>
            </div>
        
      

      <script src="./js/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
      <script defer src="./js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script defer src="./js/highcharts.js"></script>
      <script defer type="text/javascript" src="/js/last_updated.js"></script>
      <script async type="text/javascript" src="/js/typeahead.js"></script>
      <script defer type="text/javascript" src="/js/chart.js"></script>
      <script defer type="text/javascript" src="/js/offline.js"></script>
      <script defer type="text/javascript" src="/js/lightbox-plus-jquery.min.js"></script>
   </body>
</html>

<?php $conn->close(); ?>
