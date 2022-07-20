<?php

    namespace App\Http\Controllers;

    use App\Models\DataFeed;
    use Illuminate\Http\Request;

    class DataFeedController extends ApiController
    {

        /**
         * @param Request $request
         * @return mixed
         */
        public function getDataFeed(Request $request)
        {
            $df = new DataFeed();

            return (object)[
                'labels' => $df->getDataFeed(
                    $request->datatype,
                    'label',
                    $request->limit
                ),
                'data' => $df->getDataFeed(
                    $request->datatype,
                    'data',
                    $request->limit
                ),
            ];
        }
    }