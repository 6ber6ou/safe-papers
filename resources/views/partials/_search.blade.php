<!-- ROW -->
<div class="row">

	<!-- COL MD 8 -->
	<div class="col-md-8 col-md-offset-2">

		<form action="{{ route( 'seach_papers' ) }}" method="POST">

			{{ csrf_field() }}

			<!-- INPUT GROUP -->
			<div class="input-group">

				<input type="text" name="search" class="form-control" placeholder="Rechercher...">

				<span class="input-group-btn">
					<button type="submit" class="btn btn-success" type="button">Go!</button>
				</span>

			</div>
			<!-- End ... INPUT GROUP -->

		</form>


	</div>
	<!-- End ... COL MD 8 -->

</div>
<!-- End ... ROW -->
