# Salla Modal Search Tool

This script searches for websites that contain the HTML element `<salla-modal has-skeleton=` and saves the results to a file.

## Requirements

- Python 3.6+
- `requests` library (already installed)

## Usage

Run the script using:

```bash
./salla_search.py
```

### Command Line Arguments

- `--query`: The search string to look for (default: "<salla-modal has-skeleton=")
- `--num`: Number of search results to process (default: 100)
- `--output`: Output file name (default: "salla_sites_[timestamp].txt")
- `--workers`: Number of parallel workers for verification (default: 5)

### Examples

Search with default settings:
```bash
./salla_search.py
```

Search for a different query:
```bash
./salla_search.py --query "<salla-cart"
```

Process more results:
```bash
./salla_search.py --num 200
```

Specify output file:
```bash
./salla_search.py --output my_results.txt
```

Use more parallel verification workers (faster):
```bash
./salla_search.py --workers 10
```

## How It Works

1. The script searches Bing and DuckDuckGo for websites containing the specified query
2. It extracts unique domain names from the search results
3. For each domain, it verifies whether the site actually contains the search string (in parallel)
4. Verified sites are saved to the output file

## Performance Features

- Parallel verification: Uses multiple threads to verify websites simultaneously
- Graceful interruption: Press Ctrl+C to save current results and exit
- Progress tracking: Shows current page and verification status
- Reduced delays: Uses optimized delays to be faster while still avoiding blocks

## Anti-Blocking Features

The script includes several features to avoid being blocked by search engines:
- Uses Bing and DuckDuckGo search engines instead of Google
- Rotates through multiple user agents randomly
- Adds variable delays between requests
- Uses different referrers and additional headers to appear more like a normal browser

## Notes

- The script includes delays between requests to be polite to search engines and the target websites
- Some websites may block automated requests, so not all potential matches will be verified
- If you still encounter blocking issues, you can try reducing the number of results with `--num` or adding more delay in the code
- The script is limited to 10 pages of results (about 100 sites) to make the search more efficient 