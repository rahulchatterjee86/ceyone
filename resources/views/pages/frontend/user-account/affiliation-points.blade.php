@php $aff_id = $login_user_details['appliation_id']; @endphp
<div class="row">
    <div class="col-12">
        <h5><label>Affiliation Products</label></h5>
        <hr>
        <br>
        <table id="table_user_account_order_list" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
                <th>Product Image</th>
                <th>Product Title</th>
                <th>Product Price</th>
                <th>Action </th>

            </thead>
            <tbody>
                @foreach($affiliation_products as $key=>$affiliation)
                    <tr>
                        @if(!empty($affiliation->image_url))
                            <td>
                                <img src="{{ get_image_url($affiliation->image_url) }}" alt="{{ basename ($affiliation->image_url) }}" height="60px" width="70px">
                            </td>
                        @else
                            <td><img src="{{ default_placeholder_img_src() }}" alt="" height="60px" width="70px"></td>
                        @endif

                        <td>{{ $affiliation->title }}</td>
                        <td>{{ $affiliation->price }}</td>
                        <input type="hidden" id="aff_link{{ $key }}" value="{{ url('/product/affiliation_details/' . $affiliation->slug . '/' . $aff_id ) }}">
                        <td>
                            <button type="button" id="tool{{ $key }}" onclick="myFunction({{ $key }})" class="btn btn-success btn-flat">Copy Link</button>
                        </td>

                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Product Image</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </tr>
            </tfoot>
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