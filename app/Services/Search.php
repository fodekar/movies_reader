<?php

use Sonata\Cache\Counter;

class Search
{
    public $movie_extension = ["mp4", "avi", "wmv", "mkv"];
    
    public $dir_exclude = [
        "Recycle.Bin",
        "wamp",
        "Program Files",
        "AdwCleaner",
        "favorites",
        "MSOCache",
        "ProgramData",
        "Logs",
        "Ruby",
        "SWSetup",
        "SWSetup",
        "SkillSoft",
        "System Volume Information",
        "Application Data",
        "AVG",
        "Cursors",
        "Recovery",
        "windows",
        "Adobe",
        "system",
        "debug",
        "fonts",
        "AMD",
        "Driver",
        "HeidiSQL",
        "McAfee",
        "MFAData",
        "Menu Démarrer",
        "Crypto",
        "Microsoft",
        "SendTo",
        "Start Menu",
        "Cookies",
        "Doctrine",
        "temp",
        ".db-shm",
        ".xls",
        ".vcf",
        ".ssql",
        ".zip",
        ".class",
        ".java",
        ".Trash",
        ".ps1",
        ".php",
        ".css",
        ".mp3",
        ".url",
        ".scss",
        ".less",
        ".html",
        ".twig",
        ".js",
        ".md",
        ".dll",
        ".phar",
        ".doc",
        "xlsx",
        ".pdf",
        ".Woff",
        ".eot",
        "svg",
        ".ttf",
        ".pot",
        ".yml",
        ".swt$",
        ".conf",
        ".lnk",
        ".config",
        ".travis",
        ".vim",
        ".buildpath",
        ".project",
        ".settings",
        ".svn",
        ".git",
        ".env",
        ".bash",
        ".ssh",
        ".sh",
        ".vscode",
        ".txt",
        ".dat",
        ".ini",
        ".rsm",
        ".jpg",
        ".jpeg",
        ".gif",
        ".xml",
        ".png",
        ".ico",
        ".exe",
        ".msi",
        ".tudb",
        ".msu",
        ".cab",
        ".db-wal",
        ".contact"
    ];
        
    public function getMovies($limit = 10, $dir = "C:/")
    {
        $data = scandir($dir);

        $this->removeSesssion();

        return $this->scan($data, $dir, $limit);
    }

    /**
     * Remove session list movies for reset
     */
    protected function removeSesssion($name = 'movies')
    {
        if (isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        }
    }


    public function scan($data, $dir, $limit)
    {
        $counter = 0;
        $output = false;
        $movies = $movies_dir = [];

        foreach($data as $filename)
        {
            $file = $dir . $filename;

            if (is_dir($file)) {
                $this->loopDir($file, $limit);

                $file = $this->getSession();

                if (!empty($file)) {
                    $movies_dir = $file;
                }
            }
            else {
                $movie = $this->isMovie($file);

                if (!empty($movie)) {
                    $movies[$movie] = $movie;
                    
                    $counter = $this->getSession('counter_movie') + 1;

                    $this->setSession($counter, 'counter_movie');
                }
            }

            $output = array_merge_recursive($movies, $movies_dir);

            if ($counter >= $limit) {
                return $output;
            }
        }

        return $output;
    }

    public function loopDir($dir, $limit)
    {
        $output = [];
        $counter = $loop_movie = 0;

        if ($handle = @opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if (( $entry != '.' ) && ( $entry != '..' )) {
                    $file = "$dir/$entry";
                    $ignore_file = preg_match("/". implode('|', $this->dir_exclude) ."/i", $file);

                    if (!$ignore_file && file_exists($file)) {    
                        $counter++;

                        if ($this->getSession('counter_movie') >= $limit)
                            return [];

                        if(is_dir($file)) {
                            $this->loopDir($file, $limit);
                        }
                        else {
                            $movie = $this->isMovie($file);

                            if (!empty($movie)) {
                                $output[$movie] = $movie;

                                $loop_movie = $this->getSession('counter_movie') + 1;

                                $this->setSession($loop_movie, 'counter_movie');
                            }
                        }
                    }
                }
            }
        
            closedir($handle);
        }

        if (!empty($output)) {
            $movies_storage = $this->getSession();
            $movies = (!empty($movies_storage)) ? array_merge($movies_storage, $output) : $output;
            
            $this->setSession($movies);
        }

        return $output;
    }

    public function isMovie($file)
    {
        $output = false;

        if (file_exists($file) && is_file($file)) {
            $info = pathinfo($file);
            $extension = isset($info['extension']) ? $info['extension'] : false;
    
            if (in_array($extension, $this->movie_extension)) {
                $output = $file;
            }
        }

        return $output;
    }

    private function getSession($name = 'movies')
    {
        $movies = isset($_SESSION[$name]) ? $_SESSION[$name] : null;

        return $movies;
    }

    private function setSession($data, $name = 'movies')
    {
        $_SESSION[$name] = $data;
    }
}
