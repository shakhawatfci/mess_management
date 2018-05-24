
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="{{ url('/') }}"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

			<li><a href="{{ route('member.create') }}"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>Member</a></li>
			
			<li><a href="{{ route('asset.create') }}"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Insert Asset</a></li>
			<li><a href="{{ route('bazar.create') }}"><svg class="glyph stroked table"><use xlink:href="#stroked-table"></use></svg> Insert Bazar</a></li>
			<li><a href="{{ route('meal.create') }}"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg>Insert Meal</a></li>

			
			<li>
			<a href="{{ route('meal.chart') }}"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg>Meal  Chart</a>
			</li>

			<li>
			<a href="{{ route('personal.meal') }}"><svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>Meal History</a>
			</li>	
			<li>
			<a href="{{ route('bazar.index') }}"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>Bazar History</a>
			</li>

			<li>
			<a href="{{ route('asset.index') }}"><svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>Asset History</a>
			</li>	

			


		<!-- 	<li class="parent ">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
						</a>
					</li>
					<li>
						<a class="" href="#">
							<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
						</a>
					</li>
				</ul>
			</li> -->

		</ul>
		<div class="attribution">Developed by <a target="_blank" href="http://www.facebook.com/snsabbir.fci">Shakhawat</a></div>
	</div>

	<!--/.sidebar-->