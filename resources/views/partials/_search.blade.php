<!-- ROW -->
<div class="row">

	<!-- COL MD 8 -->
	<div class="col-md-8 col-md-offset-2">

		<form action="{{ route( 'seach_papers' ) }}" method="POST">

			{{ csrf_field() }}

			<!-- INPUT GROUP -->
			<div class="input-group">

				<input type="text" name="search" id="search" class="form-control" placeholder="Rechercher..." required autocomplete="off">

				<span class="input-group-btn">
					<button type="submit" class="ladda-button btn btn-success spinner" data-style="zoom-in" type="button"><span class="fa fa-send-o"></span></button>
				</span>

			</div>
			<!-- End ... INPUT GROUP -->

		</form>

	</div>
	<!-- End ... COL MD 8 -->

</div>
<!-- End ... ROW -->
