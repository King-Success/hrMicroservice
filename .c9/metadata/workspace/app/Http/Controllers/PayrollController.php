{"filter":false,"title":"PayrollController.php","tooltip":"/app/Http/Controllers/PayrollController.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":69,"column":78},"end":{"row":70,"column":0},"action":"insert","lines":["",""],"id":2374},{"start":{"row":70,"column":0},"end":{"row":70,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":70,"column":8},"end":{"row":70,"column":61},"action":"insert","lines":["$payroll = $this->payrollModel->findById($payrollId);"],"id":2375}],[{"start":{"row":71,"column":50},"end":{"row":71,"column":136},"action":"insert","lines":["'bank' => $bank, 'view_type' => isset($_GET['view_type']) ? $_GET['view_type'] : false"],"id":2376}],[{"start":{"row":71,"column":50},"end":{"row":72,"column":0},"action":"insert","lines":["",""],"id":2377},{"start":{"row":72,"column":0},"end":{"row":72,"column":12},"action":"insert","lines":["            "]}],[{"start":{"row":70,"column":61},"end":{"row":71,"column":0},"action":"insert","lines":["",""],"id":2378},{"start":{"row":71,"column":0},"end":{"row":71,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":71,"column":8},"end":{"row":72,"column":0},"action":"insert","lines":["",""],"id":2379},{"start":{"row":72,"column":0},"end":{"row":72,"column":8},"action":"insert","lines":["        "]}],[{"start":{"row":72,"column":8},"end":{"row":72,"column":52},"action":"insert","lines":["$bank = $this->bankModel->findById($bankId);"],"id":2380}],[{"start":{"row":72,"column":23},"end":{"row":72,"column":32},"action":"remove","lines":["bankModel"],"id":2381},{"start":{"row":72,"column":23},"end":{"row":72,"column":24},"action":"insert","lines":["s"]}],[{"start":{"row":72,"column":24},"end":{"row":72,"column":25},"action":"insert","lines":["a"],"id":2382}],[{"start":{"row":72,"column":25},"end":{"row":72,"column":26},"action":"insert","lines":["l"],"id":2383}],[{"start":{"row":72,"column":26},"end":{"row":72,"column":27},"action":"insert","lines":["a"],"id":2384}],[{"start":{"row":72,"column":27},"end":{"row":72,"column":28},"action":"insert","lines":["r"],"id":2385}],[{"start":{"row":72,"column":28},"end":{"row":72,"column":29},"action":"insert","lines":["y"],"id":2386}],[{"start":{"row":72,"column":28},"end":{"row":72,"column":29},"action":"remove","lines":["y"],"id":2387}],[{"start":{"row":72,"column":27},"end":{"row":72,"column":28},"action":"remove","lines":["r"],"id":2388}],[{"start":{"row":72,"column":26},"end":{"row":72,"column":27},"action":"remove","lines":["a"],"id":2389}],[{"start":{"row":72,"column":25},"end":{"row":72,"column":26},"action":"remove","lines":["l"],"id":2390}],[{"start":{"row":72,"column":25},"end":{"row":72,"column":26},"action":"insert","lines":["l"],"id":2391}],[{"start":{"row":72,"column":23},"end":{"row":72,"column":26},"action":"remove","lines":["sal"],"id":2392},{"start":{"row":72,"column":23},"end":{"row":72,"column":43},"action":"insert","lines":["salaryComponentModel"]}],[{"start":{"row":72,"column":54},"end":{"row":72,"column":61},"action":"remove","lines":["$bankId"],"id":2393},{"start":{"row":72,"column":54},"end":{"row":72,"column":66},"action":"insert","lines":["$componentId"]}],[{"start":{"row":72,"column":12},"end":{"row":72,"column":13},"action":"remove","lines":["k"],"id":2394}],[{"start":{"row":72,"column":11},"end":{"row":72,"column":12},"action":"remove","lines":["n"],"id":2395}],[{"start":{"row":72,"column":10},"end":{"row":72,"column":11},"action":"remove","lines":["a"],"id":2396}],[{"start":{"row":72,"column":9},"end":{"row":72,"column":10},"action":"remove","lines":["b"],"id":2397}],[{"start":{"row":72,"column":9},"end":{"row":72,"column":10},"action":"insert","lines":["s"],"id":2398}],[{"start":{"row":72,"column":10},"end":{"row":72,"column":11},"action":"insert","lines":["a"],"id":2399}],[{"start":{"row":72,"column":11},"end":{"row":72,"column":12},"action":"insert","lines":["l"],"id":2400}],[{"start":{"row":72,"column":12},"end":{"row":72,"column":13},"action":"insert","lines":["a"],"id":2401}],[{"start":{"row":72,"column":13},"end":{"row":72,"column":14},"action":"insert","lines":["r"],"id":2402}],[{"start":{"row":72,"column":8},"end":{"row":72,"column":14},"action":"remove","lines":["$salar"],"id":2403},{"start":{"row":72,"column":8},"end":{"row":72,"column":25},"action":"insert","lines":["$salaryComponents"]}],[{"start":{"row":72,"column":24},"end":{"row":72,"column":25},"action":"remove","lines":["s"],"id":2404}],[{"start":{"row":74,"column":13},"end":{"row":74,"column":17},"action":"remove","lines":["bank"],"id":2405},{"start":{"row":74,"column":13},"end":{"row":74,"column":14},"action":"insert","lines":["s"]}],[{"start":{"row":74,"column":14},"end":{"row":74,"column":15},"action":"insert","lines":["a"],"id":2406}],[{"start":{"row":74,"column":15},"end":{"row":74,"column":16},"action":"insert","lines":["l"],"id":2407}],[{"start":{"row":74,"column":16},"end":{"row":74,"column":17},"action":"insert","lines":["a"],"id":2408}],[{"start":{"row":74,"column":17},"end":{"row":74,"column":18},"action":"insert","lines":["r"],"id":2409}],[{"start":{"row":74,"column":18},"end":{"row":74,"column":19},"action":"insert","lines":["y"],"id":2410}],[{"start":{"row":74,"column":13},"end":{"row":74,"column":19},"action":"remove","lines":["salary"],"id":2411},{"start":{"row":74,"column":13},"end":{"row":74,"column":29},"action":"insert","lines":["salaryComponents"]}],[{"start":{"row":74,"column":28},"end":{"row":74,"column":29},"action":"remove","lines":["s"],"id":2412}],[{"start":{"row":74,"column":33},"end":{"row":74,"column":38},"action":"remove","lines":["$bank"],"id":2413},{"start":{"row":74,"column":33},"end":{"row":74,"column":49},"action":"insert","lines":["$salaryComponent"]}],[{"start":{"row":73,"column":50},"end":{"row":73,"column":115},"action":"insert","lines":["'payroll' => $payroll, 'paycheckSummaries' => $paycheckSummaries,"],"id":2414}],[{"start":{"row":71,"column":8},"end":{"row":71,"column":86},"action":"insert","lines":["$paycheckSummaries = $this->paycheckSummaryModel->findByPayrollId($payrollId);"],"id":2415}],[{"start":{"row":71,"column":25},"end":{"row":71,"column":26},"action":"remove","lines":["s"],"id":2416}],[{"start":{"row":71,"column":24},"end":{"row":71,"column":25},"action":"remove","lines":["e"],"id":2417}],[{"start":{"row":71,"column":23},"end":{"row":71,"column":24},"action":"remove","lines":["i"],"id":2418}],[{"start":{"row":71,"column":22},"end":{"row":71,"column":23},"action":"remove","lines":["r"],"id":2419}],[{"start":{"row":71,"column":21},"end":{"row":71,"column":22},"action":"remove","lines":["a"],"id":2420}],[{"start":{"row":71,"column":20},"end":{"row":71,"column":21},"action":"remove","lines":["m"],"id":2421}],[{"start":{"row":71,"column":19},"end":{"row":71,"column":20},"action":"remove","lines":["m"],"id":2422}],[{"start":{"row":71,"column":18},"end":{"row":71,"column":19},"action":"remove","lines":["u"],"id":2423}],[{"start":{"row":71,"column":17},"end":{"row":71,"column":18},"action":"remove","lines":["S"],"id":2424}],[{"start":{"row":71,"column":17},"end":{"row":71,"column":18},"action":"insert","lines":["C"],"id":2425}],[{"start":{"row":71,"column":18},"end":{"row":71,"column":19},"action":"insert","lines":["o"],"id":2426}],[{"start":{"row":71,"column":19},"end":{"row":71,"column":20},"action":"insert","lines":["m"],"id":2427}],[{"start":{"row":71,"column":20},"end":{"row":71,"column":21},"action":"insert","lines":["p"],"id":2428}],[{"start":{"row":71,"column":21},"end":{"row":71,"column":22},"action":"insert","lines":["o"],"id":2429}],[{"start":{"row":71,"column":22},"end":{"row":71,"column":23},"action":"insert","lines":["n"],"id":2430}],[{"start":{"row":71,"column":8},"end":{"row":71,"column":23},"action":"remove","lines":["$paycheckCompon"],"id":2431},{"start":{"row":71,"column":8},"end":{"row":71,"column":27},"action":"insert","lines":["$paycheckComponents"]}],[{"start":{"row":71,"column":37},"end":{"row":71,"column":57},"action":"remove","lines":["paycheckSummaryModel"],"id":2432},{"start":{"row":71,"column":37},"end":{"row":71,"column":38},"action":"insert","lines":["p"]}],[{"start":{"row":71,"column":38},"end":{"row":71,"column":39},"action":"insert","lines":["a"],"id":2433}],[{"start":{"row":71,"column":39},"end":{"row":71,"column":40},"action":"insert","lines":["y"],"id":2434}],[{"start":{"row":71,"column":40},"end":{"row":71,"column":41},"action":"insert","lines":["c"],"id":2435}],[{"start":{"row":71,"column":41},"end":{"row":71,"column":42},"action":"insert","lines":["h"],"id":2436}],[{"start":{"row":71,"column":42},"end":{"row":71,"column":43},"action":"insert","lines":["e"],"id":2437}],[{"start":{"row":71,"column":43},"end":{"row":71,"column":44},"action":"insert","lines":["c"],"id":2438}],[{"start":{"row":71,"column":44},"end":{"row":71,"column":45},"action":"insert","lines":["k"],"id":2439}],[{"start":{"row":71,"column":45},"end":{"row":71,"column":46},"action":"insert","lines":["c"],"id":2440}],[{"start":{"row":71,"column":45},"end":{"row":71,"column":46},"action":"remove","lines":["c"],"id":2441}],[{"start":{"row":71,"column":45},"end":{"row":71,"column":46},"action":"insert","lines":["C"],"id":2442}],[{"start":{"row":71,"column":37},"end":{"row":71,"column":46},"action":"remove","lines":["paycheckC"],"id":2443},{"start":{"row":71,"column":37},"end":{"row":71,"column":59},"action":"insert","lines":["paycheckComponentModel"]}],[{"start":{"row":73,"column":96},"end":{"row":73,"column":114},"action":"remove","lines":["$paycheckSummaries"],"id":2444},{"start":{"row":73,"column":96},"end":{"row":73,"column":115},"action":"insert","lines":["$paycheckComponents"]}],[{"start":{"row":73,"column":74},"end":{"row":73,"column":91},"action":"remove","lines":["paycheckSummaries"],"id":2445},{"start":{"row":73,"column":74},"end":{"row":73,"column":93},"action":"insert","lines":["$paycheckComponents"]}],[{"start":{"row":73,"column":74},"end":{"row":73,"column":75},"action":"remove","lines":["$"],"id":2446}],[{"start":{"row":99,"column":98},"end":{"row":99,"column":99},"action":"insert","lines":[","],"id":2447}],[{"start":{"row":99,"column":99},"end":{"row":99,"column":100},"action":"insert","lines":[" "],"id":2448}],[{"start":{"row":99,"column":100},"end":{"row":99,"column":102},"action":"insert","lines":["''"],"id":2449}],[{"start":{"row":99,"column":101},"end":{"row":99,"column":102},"action":"insert","lines":["["],"id":2450}],[{"start":{"row":99,"column":102},"end":{"row":99,"column":103},"action":"insert","lines":["a"],"id":2451}],[{"start":{"row":99,"column":102},"end":{"row":99,"column":103},"action":"remove","lines":["a"],"id":2452}],[{"start":{"row":99,"column":101},"end":{"row":99,"column":102},"action":"remove","lines":["["],"id":2453}],[{"start":{"row":99,"column":101},"end":{"row":99,"column":102},"action":"insert","lines":["p"],"id":2454}],[{"start":{"row":99,"column":102},"end":{"row":99,"column":103},"action":"insert","lines":["a"],"id":2455}],[{"start":{"row":99,"column":103},"end":{"row":99,"column":104},"action":"insert","lines":["y"],"id":2456}],[{"start":{"row":99,"column":104},"end":{"row":99,"column":105},"action":"insert","lines":["r"],"id":2457}],[{"start":{"row":99,"column":105},"end":{"row":99,"column":106},"action":"insert","lines":["o"],"id":2458}],[{"start":{"row":99,"column":106},"end":{"row":99,"column":107},"action":"insert","lines":["l"],"id":2459}],[{"start":{"row":99,"column":107},"end":{"row":99,"column":108},"action":"insert","lines":["l"],"id":2460}],[{"start":{"row":99,"column":108},"end":{"row":99,"column":109},"action":"insert","lines":["s"],"id":2461}],[{"start":{"row":99,"column":108},"end":{"row":99,"column":109},"action":"remove","lines":["s"],"id":2462}],[{"start":{"row":99,"column":109},"end":{"row":99,"column":110},"action":"insert","lines":[" "],"id":2463}],[{"start":{"row":99,"column":110},"end":{"row":99,"column":111},"action":"insert","lines":["="],"id":2464}],[{"start":{"row":99,"column":111},"end":{"row":99,"column":112},"action":"insert","lines":[">"],"id":2465}],[{"start":{"row":99,"column":112},"end":{"row":99,"column":113},"action":"insert","lines":[" "],"id":2466}],[{"start":{"row":99,"column":113},"end":{"row":99,"column":114},"action":"insert","lines":["$"],"id":2467}],[{"start":{"row":99,"column":114},"end":{"row":99,"column":115},"action":"insert","lines":["p"],"id":2468}],[{"start":{"row":99,"column":115},"end":{"row":99,"column":116},"action":"insert","lines":["a"],"id":2469}],[{"start":{"row":99,"column":116},"end":{"row":99,"column":117},"action":"insert","lines":["y"],"id":2470}],[{"start":{"row":99,"column":117},"end":{"row":99,"column":118},"action":"insert","lines":["r"],"id":2471}],[{"start":{"row":99,"column":118},"end":{"row":99,"column":119},"action":"insert","lines":["o"],"id":2472}],[{"start":{"row":99,"column":119},"end":{"row":99,"column":120},"action":"insert","lines":["l"],"id":2473}],[{"start":{"row":99,"column":120},"end":{"row":99,"column":121},"action":"insert","lines":["l"],"id":2474}]]},"ace":{"folds":[],"scrolltop":1310.20068359375,"scrollleft":7,"selection":{"start":{"row":99,"column":121},"end":{"row":99,"column":121},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":185,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1484384693171,"hash":"ba6a77328f324a221415dbfd1b5bf3d8e78e4b70"}