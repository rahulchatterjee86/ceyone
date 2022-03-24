<div class="row">
    <div class="col-12">
        <h5><label>Affiliation Points Product</label></h5>
        <hr>
        <br>
        <table id="table_user_account_order_list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <th>Product Image</th>
                <th>Product Title</th>
                <th>Affiliation Point</th>

            </thead>
            <tbody>
                @foreach($aff_products as $affiliation)
                    <tr>
                        @if(!empty($affiliation->products->image_url))
                            <td>
                                <img src="{{ get_image_url($affiliation->products->image_url) }}" alt="{{ basename ($affiliation->products->image_url) }}" height="60px" width="70px">
                            </td>
                        @else
                            <td><img src="{{ default_placeholder_img_src() }}" alt="" height="60px" width="70px"></td>
                        @endif

                        <td>{{ $affiliation->products->title }}</td>
                        <td>{{ $affiliation->affiliation_point }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    function myFunction(id) {
        var copyText = $('#aff_link' + id).val();

        navigator.clipboard.writeText(copyText);
        $('#tool' + id).text("Copied");

    }
</script>