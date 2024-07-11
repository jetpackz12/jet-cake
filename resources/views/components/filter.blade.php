<form id="formFilter">
    <div class="row pt-4 gap-2 gap-md-0">
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card h-100 w-100">
                <div class="card-body d-flex align-items-center justify-content-center gap-2">
                    <label for="filterby">Filter by:</label>
                    <select class="form-control shadow-none" name="filterby" id="filterby" style="width: 70%;" required>
                        <option value="" selected disabled></option>
                        <option value="1">Today</option>
                        <option value="2">This Month</option>
                        <option value="3">Date</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card h-100 w-100 blur" id="from-container">
                <div class="card-body d-flex align-items-center justify-content-center gap-2">
                    <label for="from">From:</label>
                    <input class="form-control" type="date" name="from" id="from" disabled required>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card h-100 w-100 blur" id="to-container">
                <div class="card-body d-flex align-items-center justify-content-center gap-2">
                    <label for="to">To:</label>
                    <input class="form-control" type="date" name="to" id="to" disabled required>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-3 mt-md-2 mt-lg-0">
            <button class="btn btn-primary h-100 w-100" type="submit">
                <i class="fa fa-filter"></i>
                Filter
            </button>
        </div>
    </div>
</form>
